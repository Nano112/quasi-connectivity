<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Quasi connectivity posts') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire('post.counter')
        </div>
    </div>

    <div class="py-12">
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @livewire('post.form')
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @livewire('post.show')
            </div>
        </div>
    </div>
</x-app-layout>
