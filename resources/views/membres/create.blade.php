<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un membre') }}
        </h2>
    </x-slot>

    <x-membres-card>
        <livewire:create-membre />
    </x-membres-card>
</x-app-layout>