<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des Stocks')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-xs text-gray-500">#</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom de la Cooperative')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang(' Ressource')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite Initiale')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite Disponible ')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite Seuil Alerte ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($stocks as $stock)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$stock->cooperative->nom_cooperative  }}</td>
						  <td class="px-4 py-4 text-sm text-gray-500">{{$stock->ressource->nom_ressource  }}</td>
                        <td class="px-4 py-4">{{ $stock->quantite_initiale }}</td>
						 <td class="px-4 py-4">{{ $stock->quantite_disponible }}</td>
						 <td class="px-4 py-4">{{ $stock->seuil_alerte }}</td>
						 
                        <x-link-button href="{{ route('stocks.show', $stock->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('stocks.edit', $stock->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce  stock?')) {document.getElementById('destroy{{ $stock->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $stock->id }}" action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $stocks->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>