<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher la  Transction')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la  Cooperative ')</h3>
	  <p> {{ $transaction->id_cooperative }}  {{ $transaction->cooperative->Nom_cooperatve }}</p>
	   <h3 class="font-semibold text-xl text-gray-800">@lang('Type de Transction ')</h3>
	  <p>  {{ $transaction->type_transaction }}</p>		
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Montant de la  transaction')</h3>
        <p>{{ $transaction->montant }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('description')</h3>
        <p>{{ $transaction->description }}</p>
		  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Transction')</h3>
        <p>{{ $transaction->date_transaction }}</p>
       
    </x-membres-card>
</x-app-layout>