<div class="flex flex-col items-center justify-center space-y-2">
    <div class="text-2xl font-bold p-6">
        {{ $counter }}
    </div>

    <div class="flex items-center justify-center space-x-2 p-6">
        <button wire:click="increment" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Increment
        </button>

        <button wire:click="decrement" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Decrement
