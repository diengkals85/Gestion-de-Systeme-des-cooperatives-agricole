<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Afficher  la culture')
        </h2>
    </x-slot>

    <x-membres-card>
        <h3 class="font-semibold text-xl text-gray-800">@lang('Nom de la Culture')</h3>
        <p>{{ $culture->Nom_Culture }}</p>
		 <h3 class="font-semibold text-xl text-gray-800">@lang('Description')</h3>
        <p>{{ $culture->Description }}</p>
		 <h3 class="font-semibold text-xl text-gray-800">@lang('Rendement Estime')</h3>
        <p>{{ $culture->rendement_estime }}</p>
		 <h3 class="font-semibold text-xl text-gray-800">@lang('Rendement Reel')</h3>
        <p>{{ $culture->rendement_reel }}</p>
		
     
       
    </x-membres-card>
</x-app-layout>