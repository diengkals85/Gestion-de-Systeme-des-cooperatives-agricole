<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Cooperative')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Adresse de la Cooperative')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Date de la Creation')</th>
                
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($cooperatives as $cooperative)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $cooperative->id }}</td>
                        <td class="px-4 py-4">{{ $cooperative->nom_cooperative }}</td>
						 <td class="px-4 py-4">{{ $cooperative->adresse }}</td>
						   <td class="px-4 py-4">{{ $cooperative->date_creation }}</td>
                        
                        <x-link-button href="{{ route('cooperatives.show', $cooperative->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('cooperatives.edit', $cooperative->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette cooperative?')) {document.getElementById('destroy{{ $cooperative->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $cooperative->id }}" action="{{ route('cooperatives.destroy', $cooperative->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $cooperatives->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>