<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des subventions')
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
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Partenaire')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Reception')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Montant ')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Description ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($subventions as $subvention)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$subvention->cooperative->nom_cooperative  }}</td>
						  <td class="px-4 py-4 text-sm text-gray-500">{{$subvention->partenaire->nom_partenaire  }}</td>
                        <td class="px-4 py-4">{{ $subvention->date_reception }}</td>
						 <td class="px-4 py-4">{{ $subvention->montant }}</td>
						 <td class="px-4 py-4">{{ $subvention->description }}</td>
						 
                        <x-link-button href="{{ route('subventions.show', $subvention->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('subventions.edit', $subvention->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette  subvention?')) {document.getElementById('destroy{{ $subvention->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $subvention->id }}" action="{{ route('subventions.destroy', $subvention->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $subventions->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>