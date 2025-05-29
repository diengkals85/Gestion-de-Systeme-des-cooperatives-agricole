<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Membre List')
        </h2>
    </x-slot>
    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
	  
	            <!-- Formulaire de Recherche -->
             <form action="{{ route('membres.index') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="@lang('Rechercher par nom, prénom ou contact')" 
                           value="{{ request('search') }}" 
                           class="px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
						    <x-primary-button class="ml-3">
                  @lang('Rechercher')
                </x-primary-button>
                   
                   
                </div>
            </form>
	  
	  
	  
	  
	  
	  
	  
	  
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                     <tr>
                      <th class="px-2 py-2 text-xs text-gray-500">#</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom Membre')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Prenom Membre')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Contact Membre')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Status Membre')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Creation ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($membres as $membre)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $membre->id }}</td>
                        <td class="px-4 py-4">{{ $membre->Nom_membre }}</td>
						 <td class="px-4 py-4">{{ $membre->Prenom_membre }}</td>
						  <td class="px-4 py-4">{{ $membre->contact_membre }}</td>
						  <td class="px-4 py-4">{{ $membre->Status }}</td>
						   <td class="px-4 py-4">{{ $membre->Date_adhesion }}</td>
                        
                        <x-link-button href="{{ route('membres.show', $membre->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('membres.edit', $membre->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce membre?')) {document.getElementById('destroy{{ $membre->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $membre->id }}" action="{{ route('membres.destroy', $membre->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $membres->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>