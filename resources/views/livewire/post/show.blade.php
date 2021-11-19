<div>
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr @if ($loop->even)class="bg-grey"@endif>
                    <td class="px-4 py-2 border">{{ $item->title }}</td>
                    <td class="px-4 py-2 border">@if ($item->approved)Approved @else Not Approved @endif</td>
                    <td class="px-4 py-2 border">
                        <button class="btn btn-info">info</button>
                        <button wire:click="deleteItem({{ $item->id }})" class="btn btn-error">Delete</button>
                        @if ($item->approved)
                            <button wire:click="markAsToDo({{ $item->id }})" class="btn btn-warning">warning</button>
                        @else
                            <button wire:click="markAsDone({{ $item->id }})"
                                class="btn btn-success">Approve</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
