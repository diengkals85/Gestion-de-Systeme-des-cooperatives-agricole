<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Cultures')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom de la Culture')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Description Culture')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Rendement Estime')</th>
					  <th class="px-2 py-2 text-xs text-gray-500">@lang('Rendement Reel')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($cultures as $culture)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $culture->id }}</td>
                        <td class="px-4 py-4">{{ $culture->Nom_Culture }}</td>
						 <td class="px-4 py-4">{{ $culture->Description }}</td>
						 <td class="px-4 py-4">{{ $culture->rendement_estime }}</td>
						 <td class="px-4 py-4">{{ $culture->rendement_reel }}</td>
                        
                        <x-link-button href="{{ route('cultures.show', $culture->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('cultures.edit', $culture->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette culture?')) {document.getElementById('destroy{{ $culture->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $culture->id }}" action="{{ route('cultures.destroy', $culture->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $cultures->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>