<x-jet-form-section submit="createItem">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="url" value="{{ __('Post url') }}" />
            <x-jet-input id="url" type="text" class="block w-full mt-1" wire:model.defer="url" autocomplete="url" />
            <x-jet-input-error for="url" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
