@foreach ($list as $item)
    <div class="overflow-hidden bg-base-100 card lg:card-side mb-8">
        <img src="{{ $item->image }}" class="w-1/3">
        <div class="p-0 card-body">
            <div class="h-full rounded-r-lg drawer drawer-end">
                <input id="my-drawer" type="checkbox" class="drawer-toggle">
                <div class="flex flex-col p-1 drawer-content">
                    <div class="flex mb-2">
                        <a href="{{ $item->url }}" target="__blank" class="drawer-button btn btn-info btn-sm btn-circle mr-2">
                            <i class="fas fa-link"></i>
                        </a>
                        <label for="my-drawer" class="drawer-button btn btn-sm btn-circle mr-2">
                            <i class="fas fa-ellipsis-h"></i>
                        </label>
                        @if ($item->approved)
                            <div class="badge bg-success border-none p-1 text-xs font-bold self-center">
                                <i class="fas fa-check pr-1 fa-xs"></i>
                                Approved
                            </div>
                        @else
                            <div class="badge bg-warning border-none p-1 text-xs font-bold self-center">
                                <i class="fas fa-clock pr-1 fa-xs"></i>
                                Wating for approval
                            </div>
                        @endif
                    </div>
                    <h2 class="card-title">{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                </div>
                @auth
                    <div class="drawer-side overflow-hidden">
                        <label for="my-drawer" class="drawer-overlay"></label>
                        <ul
                            class="menu py-3 shadow-lg bg-base-100 rounded-box p-4 overflow-y-auto menu w-80 text-base-content">
                            <li class="menu-title">
                                <span>
                                    Options
                                </span>
                            </li>
                            <li>
                                @if ($item->approved)
                                    <button wire:click="markAsToDo({{ $item->id }})"
                                        class="p-4 hover:bg-base-300 rounded hover:text-success">
                                        <i class="fas fa-check pr-1 fa-xs"></i>
                                        Approve
                                    </button>
                                @else
                                    <button wire:click="markAsDone({{ $item->id }})"
                                        class="p-4 hover:bg-base-300 rounded hover:text-error">

                                        <i class="fas fa-times pr-1 fa-xs"></i>
                                        Remove Approval
                                    </button>
                                @endif
                            </li>
                        </ul>
                    </div>
                @endauth

            </div>
        </div>
    </div>



@endforeach
