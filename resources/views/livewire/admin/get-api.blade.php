<div>
    <h2>
        Api Key
    </h2>
    <div x-data class="flex justify-center">
        <input wire:model="apiKey" readonly class="cursor-default bg-gray-200">
        <div
            class="mt-3 text-sm leading-5 text-gray-500 sm:mt-0 transition duration-200 ease-in-out transform hover:scale-101 active:scale-99 cursor-pointer">
            <button type="button" @click="$clipboard($wire.apiKey)"
                class="font-medium bg-indigo-600 hover:bg-indigo-500 transition ease-in-out duration-150 text-white p-2">
                <span class="fas fa-clipboard"></span>
                Copy
            </button>
        </div>
        <div
            class="mt-3 text-sm leading-5 text-gray-500 sm:mt-0 transition duration-200 ease-in-out transform hover:scale-101 active:scale-99 cursor-pointer">
            <button type="button" x-on:click="$wire.refreshApiKey()"
                class="font-medium bg-indigo-600 hover:bg-indigo-500 transition ease-in-out duration-150 text-white p-2 rounded-r">
                <span class="fas fa-sync-alt"></span>
            </button>
        </div>
    </div>
</div>
