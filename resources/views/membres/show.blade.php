<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Show a membre')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom')</h3>
        <p>{{ $membre->Nom_membre }}</p>
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Prenom')</h3>
        <p>{{ $membre->Prenom_membre }}</p>
		
		  <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Contact')</h3>
        <p>{{ $membre->contact_membre }}</p>
		
		 <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('status')</h3>
        <p>{{ $membre->Status }}</p>
    
        <h3 class="font-semibold text-xl text-gray-800 pt-2">@lang('Date Adhesion')</h3>
        <p>{{ $membre->Date_adhesion }}</p>
       
    </x-membres-card>
</x-app-layout>