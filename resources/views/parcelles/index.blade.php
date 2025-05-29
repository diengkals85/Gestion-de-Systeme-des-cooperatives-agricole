<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('La liste des Parcelles')
        </h2>
    </x-slot>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow pt-6">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-2 text-xs text-gray-500">#</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom parcelle')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Superficie')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Type de Sol')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Localisation')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('PH du Sol')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom Projet')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Culture Actuelle ')</th>
                                <th class="px-2 py-2 text-xs text-gray-500">@lang('Rendement ')</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($parcelles as $parcelle)
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-4 text-sm text-gray-500"></td>
                                    <td class="px-4 py-4">{{ $parcelle->nom_parcelle }}</td>
                                    <td class="px-4 py-4">{{ $parcelle->superficie }}</td>
                                    <td class="px-4 py-4">{{ $parcelle->type_sol }}</td>
                                    <td class="px-4 py-4">{{ $parcelle->localisation_gps }}</td>
                                    <td class="px-4 py-4">{{ $parcelle->ph_sol }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-500">{{$parcelle->projet->Nom_projet  }} </td>
                                    <td class="px-4 py-4 text-sm text-gray-500">{{$parcelle->culture->Nom_Culture  }}</td> 
                                    <td class="px-4 py-4">{{ $parcelle->rendement }}</td>
                                    <x-link-button href="{{ route('parcelles.show', $parcelle->id) }}">
                                        @lang('Show')
                                    </x-link-button>
                                    <x-link-button href="{{ route('parcelles.edit', $parcelle->id) }}">
                                        @lang('edit')
                                    </x-link-button>
                                    <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce projet?')) {document.getElementById('destroy{{ $parcelle->id }}').submit();}">
                                        @lang('Delete')
                                    </x-link-button>
                                    <form id="destroy{{ $parcelle->id }}" action="{{ route('parcelles.destroy', $parcelle->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $parcelles->links() }} <!-- Cela génère les liens de pagination -->
                    </div>
                </div>
            </div>
            <!-- Carte Leaflet -->
            <div id="map" style="height: 500px;"></div>
        </div>
    </div>

    <!-- Script Leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([48.8566, 2.3522], 13); // Centrer sur Paris

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Ajouter des marqueurs pour chaque parcelle
            @foreach($parcelles as $parcelle)
                @if($parcelle->latitude && $parcelle->longitude)
                    L.marker([{{ $parcelle->latitude }}, {{ $parcelle->longitude }}])
                        .addTo(map)
                        .bindPopup(`<b>{{ $parcelle->nom_parcelle }}</b>`);
                @endif
            @endforeach
        });
    </script>
</x-app-layout>