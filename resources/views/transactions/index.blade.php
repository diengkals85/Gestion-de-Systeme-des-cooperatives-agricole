<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('la liste des Transaction')
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
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Type de la Transaction')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Montant')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Description ')</th>
					   <th class="px-2 py-2 text-xs text-gray-500">@lang('Date de la Transaction ')</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($transactions as $transaction)
                      <tr class="whitespace-nowrap">
					   <td class="px-4 py-4 text-sm text-gray-500"></td>
                        <td class="px-4 py-4 text-sm text-gray-500">{{$transaction->cooperative->nom_cooperative  }}</td>
						  <td class="px-4 py-4 text-sm text-gray-500">{{$transaction->type_transaction  }}</td>
                        <td class="px-4 py-4">{{ $transaction->montant }}</td>
						 <td class="px-4 py-4">{{ $transaction->description }}</td>
						  <td class="px-4 py-4">{{ $transaction->date_transaction }}</td>
						 
                        <x-link-button href="{{ route('transactions.show', $transaction->id) }}">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('transactions.edit', $transaction->id) }}">
                            @lang('edit')
                        </x-link-button>
                    
						   <x-link-button class="delete-button" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir supprimer cette  transaction?')) {document.getElementById('destroy{{ $transaction->id }}').submit();}">
                            @lang('Delete')
                        </x-link-button>
						
                        <form id="destroy{{ $transaction->id }}" action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
					<div>
				{{ $transactions->links() }} <!-- Cela génère les liens de pagination -->
				</div>
              </div>
          </div>
      </div>
</x-app-layout>