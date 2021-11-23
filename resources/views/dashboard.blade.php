<x-app-layout>
    @livewire('navigation-menu')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Make a tailwind menu with card buttons for the following routes: admin.user --}}
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __('Users') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __('Manage your users.') }}
                    </p>
                    <div class="mt-5 sm:flex sm:mt-6">
                        <div class="mt-3 text-sm leading-5 text-gray-500 sm:mt-0 sm:ml-3">
                            <a href="{{ route('admin.user.create') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                {{ __('Create a new user') }}
                            </a>
                        </div>
                    </div>
                    {{-- List all the existing users --}}
                    <div class="mt-5">
                        @foreach (\App\Models\User::all() as $user)
                            <div class="items-center">
                                <a href="{{ route('admin.user.edit', $user) }}" class="group">
                                    <div class="shadow bg-white rounded-lg my-4 p-4 group-hover:shadow-lg border-gray-300 border transition duration-200 ease-in-out transform hover:scale-102 active:scale-99">
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ $user->name }}
                                        </div>
                                        <div class="text-sm leading-5 text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
