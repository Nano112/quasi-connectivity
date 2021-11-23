<div>
    @foreach ($list as $item)
        <div x-data="{ shown: false }" x-intersect:enter.full="shown = true">
            <div class="w-full" x-show="shown" x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">

                <div class="overflow-hidden bg-base-100 card lg:card-side mb-8 max-h-full lg:max-h-48 mx-2 ">
                    @if (empty($item->video))
                        <img src="{{ $item->image }}" class="w-full max-w-3xl lg:max-w-xs object-contain bg-gray-300">
                    @else
                        <video class="w-full max-w-3xl lg:max-w-xs object-contain bg-gray-300" controls>
                            <source src="{{ $item->video }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif

                    <div class="p-0 card-body">
                        <div class="h-full rounded-r-lg bg-gray-100">
                            <div class="flex flex-col  ">
                                <div class="flex shadow p-2 bg-white">
                                    @auth
                                        @if ($item->approved)
                                            <button wire:click="markAsToDo({{ $item->id }})"
                                                class="mx-1 btn btn-success btn-sm btn-circle mr-2 btn-hover">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button wire:click="markAsDone({{ $item->id }})"
                                                class="mx-1 btn btn-warning btn-sm btn-circle mr-2 btn-hover">
                                                <i class="fas fa-clock"></i>
                                            </button>
                                        @endif
                                        <div x-cloak x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-circle mx-1 btn-hover btn-error"
                                                @click="showModal = true"><i class="fas fa-trash"></i></button>
                                            <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                                                x-show="showModal">
                                                <!-- Modal inner -->
                                                <div class="max-w-3xl px-6 py-4 mx-auto text-center bg-white rounded shadow-lg"
                                                    @click.away="showModal = false"
                                                    x-transition:enter="motion-safe:ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 scale-90"
                                                    x-transition:enter-end="opacity-100 scale-100">
                                                    <div class="flex flex-col items-center justify-between mb-6">
                                                        <h5 class="mr-3 text-black max-w-none">
                                                            Are you sure you want to delete this post ?
                                                        </h5>
                                                        <div class="self-center text-left">
                                                            <p class="text-gray-400 text-xs px-2 self-center">
                                                                Post id:{{ $item->id }}
                                                            </p>
                                                            <p class="text-gray-400 text-xs px-2 self-center">
                                                                Post title:{{ $item->title }}
                                                            </p>
                                                            <p class="text-gray-400 text-xs px-2 self-center">
                                                                Post created :{{ $item->created_utc }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <button wire:click="deleteItem({{ $item->id }})"
                                                        class="btn btn-error">
                                                        Yes I am sure !
                                                    </button>
                                                    <button type="button" class="btn" @click="showModal = false">
                                                        Close Modal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    @endauth

                                    <a href="{{ $item->url }}" target="__blank"
                                        class="drawer-button btn btn-info btn-sm btn-circle mx-1 btn-hover">
                                        <i class="fas fa-link"></i>
                                    </a>

                                    @if ($item->approved)
                                        <div
                                            class="mx-1 badge bg-success border-none py-4 px-2 text-xs font-bold leading-3 text-center">
                                            <i class="fas fa-check pr-1 fa-xs"></i>
                                            Approved
                                        </div>
                                    @else
                                        <div
                                            class="mx-1 badge bg-warning border-none py-4 px-2 text-xs font-bold leading-3 text-center">
                                            <i class="fas fa-clock pr-1 fa-xs"></i>
                                            Wating approval
                                        </div>
                                    @endif

                                    <div class="self-center">
                                        <p class="text-gray-400 text-xs px-2 self-center">
                                            Post id:{{ $item->id }}
                                        </p>
                                        <p class="text-gray-400 text-xs px-2 self-center">
                                            Post created :{{ $item->created_utc }}
                                        </p>
                                    </div>

                                </div>
                                <div class="p-3">
                                    <h2 class="card-title">{{ $item->title }}</h2>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
