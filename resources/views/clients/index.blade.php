<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('La liste des clients')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom Client')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Prenom Client')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Contact Client')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Email Client')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Adresse Client ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($clients as $client)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $client->id }}</td>
                        <td class="px-4 py-4">{{ $client->nom_client }}</td>
						 <td class="px-4 py-4">{{ $client->prenom_client }}</td>
						  <td class="px-4 py-4">{{ $client->contact }}</td>
						  <td class="px-4 py-4">{{ $client->email }}</td>
						   <td class="px-4 py-4">{{ $client->adresse }}</td>
                        
                        <x-link-button href="{{ route('clients.show', $client->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('clients.edit', $client->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce client?')) {document.getElementById('destroy{{ $client->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $client->id }}" action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $clients->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>