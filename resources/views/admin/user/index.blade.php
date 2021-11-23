<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h1 class="float-left">
                Users
            </h1>
            <div class="float-right">
                <a href="{{ route('admin.user.create') }}" class="float-right bg-primary hover:bg-primary text-white font-bold py-2 px-4 rounded-sm">
                    Add User
                </a>
            </div>
        </div>
    </x-slot>
    <div class="p-8 sm:px-0">
        <div class="py-12 pt-0 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:admin.user.index-table />
        </div>
    </div>
</x-app-layout>

