<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des Resource')
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
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Type de la Ressource')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom de la Ressource')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Quantite de la Ressource ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($ressources as $ressource)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$ressource->cooperative->nom_cooperative  }}</td>
						  <td class="px-4 py-4 text-sm text-gray-500">{{$ressource->typeressource->type  }}</td>
                        <td class="px-4 py-4">{{ $ressource->nom_ressource }}</td>
						 <td class="px-4 py-4">{{ $ressource->Qte_ressource }}</td>
						 
                        <x-link-button href="{{ route('ressources.show', $ressource->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('ressources.edit', $ressource->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette  ressource?')) {document.getElementById('destroy{{ $ressource->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						 @role('admin')
                        <form id="destroy{{ $ressource->id }}" action="{{ route('ressources.destroy', $ressource->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
						@endrole
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $ressources->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>