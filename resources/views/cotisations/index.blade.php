<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Cotisation des Membres')
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
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Nom Membre')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Montant')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Date Cotisation ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($cotisations as $cotisation)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$cotisation->membre->Nom_membre  }}  </td>
                        <td class="px-4 py-4">{{ $cotisation->Montant }}</td>
						 <td class="px-4 py-4">{{ $cotisation->Date_cotisation }}</td>
						 
                        <x-link-button href="{{ route('cotisations.show', $cotisation->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('cotisations.edit', $cotisation->id) }}">
                            @lang('edit')
                        </x-link-button>
						 <x-link-button href="{{ route('cotisations.receipt', $cotisation->id) }}">
                            @lang('Imprimer')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer ce membre?')) {document.getElementById('destroy{{ $cotisation->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $cotisation->id }}" action="{{ route('cotisations.destroy', $cotisation->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $cotisations->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>