<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des Employes ')
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
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Prenom')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Poste ')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Salaire ')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Embauche ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($employes as $employe)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$employe->cooperative->nom_cooperative  }}</td>
                        <td class="px-4 py-4">{{ $employe->nom }}</td>
						 <td class="px-4 py-4">{{ $employe->prenom }}</td>
						 <td class="px-4 py-4">{{ $employe->poste }}</td>
						 <td class="px-4 py-4">{{ $employe->salaire }}</td>
						 <td class="px-4 py-4">{{ $employe->date_embauche }}</td>
						 
                        <x-link-button href="{{ route('employes.show', $employe->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('employes.edit', $employe->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette  employe?')) {document.getElementById('destroy{{ $employe->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $employe->id }}" action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $employes->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>