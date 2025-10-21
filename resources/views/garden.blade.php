<x-layouts.app :title="__('My Garden')">
    <div class="flex h-full flex-col p-4">
        <div class="flex justify-between items-center">
            <flux:heading level="1" size="xl" class="text-2xl font-bold dark:text-white">My Garden</flux:heading>
            <flux:button href="{{ route('pots.create') }}" variant="primary" color="green">
                + Add Pot
            </flux:button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-4">
            @forelse ($pots as $pot)
            <x-pot-card :pot="$pot" />
            @empty
            <flux:text size="lg" class="col-span-full dark:text-gray-300">You haven't added any pots to the garden yet
            </flux:text>
            @endforelse
        </div>
        <div class="mt-auto">
            {{ $pots->links() }}
        </div>
    </div>
</x-layouts.app>