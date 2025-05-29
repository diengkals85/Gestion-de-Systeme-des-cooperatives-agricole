<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('La liste des partenaires')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom du Partenaire')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Type Partenaire')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('COntact Partenaire')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Email  Partenaire')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Adresse Partenaire ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($partenaires as $partenaire)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $partenaire->id }}</td>
                        <td class="px-4 py-4">{{ $partenaire->nom_partenaire }}</td>
						 <td class="px-4 py-4">{{ $partenaire->type_partenaire }}</td>
						  <td class="px-4 py-4">{{ $partenaire->contact }}</td>
						  <td class="px-4 py-4">{{ $partenaire->email }}</td>
						   <td class="px-4 py-4">{{ $partenaire->adresse }}</td>
                        
                        <x-link-button href="{{ route('partenaires.show', $partenaire->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('partenaires.edit', $partenaire->id) }}">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce partenaire?')) {document.getElementById('destroy{{ $partenaire->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
			
                        <form id="destroy{{ $partenaire->id }}" action="{{ route('partenaires.destroy', $partenaire->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
				<div>
				{{ $partenaires->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>