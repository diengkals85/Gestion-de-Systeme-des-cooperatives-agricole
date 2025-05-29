<div>
    @if ($successMessage)
        <div class="mt-3 mb-4 text-sm text-green-600">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Nom du membre -->
        <div>
            <x-input-label for="nom_membre" :value="__('Nom du Membre')" />
            <x-text-input wire:model="nom_membre" id="nom_membre" class="block mt-1 w-full" type="text" />
            @error('nom_membre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Prénom du membre -->
        <div class="mt-4">
            <x-input-label for="prenom_membre" :value="__('Prénom du Membre')" />
            <x-text-input wire:model="prenom_membre" id="prenom_membre" class="block mt-1 w-full" type="text" />
            @error('prenom_membre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Contact -->
        <div class="mt-4">
            <x-input-label for="contact_membre" :value="__('Contact Membre')" />
            <x-text-input wire:model="contact_membre" id="contact_membre" class="block mt-1 w-full" type="text" />
            @error('contact_membre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Statut -->
        <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />
            <select wire:model="status" id="status" class="block mt-1 w-full rounded-md border-gray-300">
                <option value="" disabled>Sélectionner un statut</option>
                <option value="Actif">Actif</option>
                <option value="Inactif">Inactif</option>
                <option value="Suspendu">Suspendu</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Date d'adhésion -->
        <div class="mt-4">
            <x-input-label for="date_adhesion" :value="__('Date Adhésion')" />
            <x-text-input wire:model="date_adhesion" id="date_adhesion" class="block mt-1 w-full" type="date" />
            @error('date_adhesion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button type="submit">
                {{ __('ENREGISTRER') }}
            </x-primary-button>
        </div>
    </form>
</div>