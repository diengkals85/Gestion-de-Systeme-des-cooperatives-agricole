<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des  Ventes')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Libelle du Produit')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom du Client')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Prix')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Date de la vente ')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Statut de la Vente ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($ventes as $vente)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$vente->produit->Nom_produit  }}</td>
						  <td class="px-4 py-4 text-sm text-gray-500">{{$vente->client->nom_client }}</td>
                        <td class="px-4 py-4">{{ $vente->quantite }}</td>
						  <td class="px-4 py-4">{{ $vente->prix_vente }}</td>
						 <td class="px-4 py-4">{{ $vente->date_vente }}</td>
						 <td class="px-4 py-4">{{ $vente->status }}</td>
						 
                        <x-link-button href="{{ route('ventes.show', $vente->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('ventes.edit', $vente->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette  vente?')) {document.getElementById('destroy{{ $vente->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $vente->id }}" action="{{ route('ventes.destroy', $vente->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $ventes->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>