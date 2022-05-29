<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Users') }}
            </h3>
            <div class="mt-5 sm:flex sm:mt-6">
                <div
                    class="mt-3 text-sm leading-5 text-gray-500 sm:mt-0 transition duration-200 ease-in-out transform hover:scale-101 active:scale-99 cursor-pointer">
                    <a href="{{ route('admin.user.create') }}"
                        class="font-medium bg-indigo-600 hover:bg-indigo-500 transition ease-in-out duration-150 text-white p-2 rounded">
                        <span class="fas fa-plus"></span>
                        {{ __('Create a new user') }}
                    </a>
                </div>
            </div>
            <div class="mt-5">
                @foreach (\App\Models\User::all() as $user)
                    <div class="items-center">
                        <div
                            class="shadow bg-white rounded-lg my-4 p-4 group-hover:shadow-lg border-gray-300 border transition duration-200 ease-in-out transform hover:scale-101 flex">
                            <div class="m-2 flex items-center justify-center w-12 h-12 rounded-full"
                                style="background-color: {{ $user->roleColor }};">
                                <span class="text-white font-bold text-2xl">
                                    {{ $user->name[0] }}
                                </span>
                            </div>
                            <div class="self-center m-2 text-sm leading-5 text-gray-500">
                                {{ $user->name }}
                            </div>
                            <div class="self-center m-2 text-sm leading-5 text-gray-500">
                                {{ $user->email }}
                            </div>
                            @if (auth()->user()->can('manage_users'))
                                <div
                                    class="self-center m-2 text-sm leading-5 text-gray-500 ml-auto transition duration-200 ease-in-out transform hover:scale-101 active:scale-99 cursor-pointer">
                                    <a href="{{ route('admin.user.edit', $user) }}"
                                        class="font-medium bg-indigo-600 hover:bg-indigo-500 text-white p-2 rounded">
                                        <span class="fas fa-edit"></span>
                                        {{ __('Edit') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
