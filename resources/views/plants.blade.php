<x-layouts.app :title="__('Plant Library')">
    <div class="flex h-full flex-col p-4">
        <div class="flex justify-between items-center">
            <flux:heading level="1" size="xl" class="text-2xl font-bold dark:text-white">Plant Library</flux:heading>
            <flux:button href="{{ route('plants.create') }}" variant="primary" color="green">
                + Add New Plant
            </flux:button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
            @forelse ($plants as $plant)
            <x-plant-card :plant="$plant" />
            @empty
            <flux:text size="lg" class="col-span-full dark:text-gray-300">You haven't added any plants to your library
                yet</flux:text>
            @endforelse
        </div>
        <div class="mt-auto">
            {{ $plants->links() }}
        </div>
    </div>
</x-layouts.app>