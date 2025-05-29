<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Cotisation des Membres')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Responsable du Projet')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Description')</th>
					    <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Debut')</th>
						  <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Fin')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Satut du Projet ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($projets as $projet)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$projet->membre->Nom_membre  }}  {{$projet->membre->Prenom_membre  }}</td>
                        <td class="px-4 py-4">{{ $projet->Description }}</td>
						<td class="px-4 py-4">{{ $projet->Date_debut }}</td>
						<td class="px-4 py-4">{{ $projet->Date_fin }}</td>
						 <td class="px-4 py-4">{{ $projet->Status_projet }}</td>
						 
                        <x-link-button href="{{ route('projets.show', $projet->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('projets.edit', $projet->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce projet?')) {document.getElementById('destroy{{ $projet->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $projet->id }}" action="{{ route('projets.destroy', $projet->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $projets->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>