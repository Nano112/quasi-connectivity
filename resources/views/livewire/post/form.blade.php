<form wire:submit.prevent="createItem">
    <div class="form-control">
        <div class="relative flex flex-col">
            <input type="url" class="w-full sm:pr-16 input input-primary input-bordered mb-4" id="url"
                placeholder="Reddit Post Url" wire:model.defer="url" autocomplete="url">

            <button type="submit" class="sm:absolute top-0 right-0 sm:rounded-l-none btn btn-primary self-center max-w-32">Submit post</button>
        </div>
        @error('url') <span class="text-error">{{ $message }}</span> @enderror
        @error('created_utc') <span class="text-error">{{ $message }}</span> @enderror
        @error('post_id') <span class="text-error">{{ $message }}</span> @enderror
    </div>
</form>
