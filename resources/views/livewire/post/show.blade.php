<div>
    <table class="w-full table-auto">
        <thead>
        <tr>
            <th class="px-4 py-2">Item</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="px-4 py-2 border">{{ $item->url }}</td>
                <td class="px-4 py-2 border">@if($item->approved)Approved @else Not Approved @endif</td>
                <td class="px-4 py-2 border">


                    <button wire:click="deleteItem({{ $item->id }})" class="px-6 text-red-600 bg-red-100 rounded-full">
                        Delete Permanently
                    </button>
                    @if($item->approved)
                        <button wire:click="markAsToDo({{ $item->id }})" class="px-6 text-red-600 bg-red-100 rounded-full">
                            Disprove
                        </button>
                    @else
                        <button wire:click="markAsDone({{ $item->id }})" class="px-6 text-black bg-green-600 rounded-full">
                            Approve
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
