<div>
    @foreach ($list as $item)
        <div class="overflow-hidden bg-base-100 card lg:card-side mb-8 max-h-full lg:max-h-48">
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
                            @endauth

                            <a href="{{ $item->url }}" target="__blank"
                                class="drawer-button btn btn-info btn-sm btn-circle mx-1 btn-hover">
                                <i class="fas fa-link"></i>
                            </a>

                            @if ($item->approved)
                                <div class="mx-1 badge bg-success border-none p-4 text-base font-bold">
                                    <i class="fas fa-check pr-1 fa-xs"></i>
                                    Approved
                                </div>
                            @else
                                <div class="mx-1 badge bg-warning border-none p-4 text-base font-bold">
                                    <i class="fas fa-clock pr-1 fa-xs"></i>
                                    Wating for approval
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
                            {{-- <div x-data="{ isDeleting: false }">
                                <button @click="isDeleting = true">Delete</button>
                                <div class="modal" x-show="isDeleting">
                                    <div class="overlay" @click="isDeleting = false"></div>

                                    <div class="modal-content">
                                        <p>Delete {{ $item->name }} model?</p>
                                        <button wire:click="deleteItem({{ $item->id }})"
                                            @click="isDeleting = false">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <a href="/components/modal#delete-modal-{{ $item->id }}"
                            class="drawer-button btn btn-error btn-sm btn-circle mr-2 btn-hover">
                            <i class="fas fa-times"></i>
                        </a>
                        <div id="delete-modal-{{ $item->id }}" class="modal">
                            <div class="modal-box">
                                <p>Are you shure you want to delete this post ?</p>
                                <div class="modal-action">
                                    <button wire:click="deleteItem({{ $item->id }})"
                                        class="drawer-button btn btn-error btn-sm btn-circle mr-2 btn-hover">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <a href="/components/modal#" class="btn">Close</a>
                                </div>
                            </div>
                        </div>
                         <button wire:click="deleteItem({{ $item->id }})"
                            class="drawer-button btn btn-error btn-sm btn-circle mr-2 btn-hover">
                            <i class="fas fa-times"></i>
                        </button> --}}

                        </div>
                        <div class="p-3">
                            <h2 class="card-title">{{ $item->title }}</h2>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @endforeach
</div>
