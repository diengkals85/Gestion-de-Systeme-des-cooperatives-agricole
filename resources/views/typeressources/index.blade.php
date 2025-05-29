<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Liste des Type de Ressource')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Type de Ressource')</th>
                     
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($typeressources as $typeressource)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $typeressource->id }}</td>
                        <td class="px-4 py-4">{{ $typeressource->type }}</td>
						
                        
                        <x-link-button href="{{ route('typeressources.show', $typeressource->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('typeressources.edit', $typeressource->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette type ?')) {document.getElementById('destroy{{ $typeressource->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $typeressource->id }}" action="{{ route('typeressources.destroy', $typeressource->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $typeressources->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>