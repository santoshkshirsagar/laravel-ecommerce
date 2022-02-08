<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $block->name }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @livewire('content.components',['block'=>$block])
        </div>
    </div>
</x-app-layout>
