<x-layouts.app :title="$plant->name">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-4xl">
            <flux:button href="{{ route('plants') }}" variant="ghost">
                &larr; Back to Plant Library
            </flux:button>
            <div class="mt-4 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-lg">
                <div class="p-6 bg-white dark:bg-zinc-800">
                    <flux:heading size="xl" class="text-3xl font-bold dark:text-white">{{ $plant->name }}</flux:heading>
                    <flux:text size="lg" class="mt-4 text-base dark:text-gray-200">{{ $plant->description ?? 'No
                        description provided.' }}
                    </flux:text>
                    <div class="mt-6 pt-4 border-t border-neutral-200 dark:border-neutral-700">
                        <flux:heading level="3" size="lg" class="text-xl font-bold dark:text-white">Care & Growth
                            Information</flux:heading>
                        <dl class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="font-medium text-gray-500 dark:text-gray-400">Watering Frequency</dt>
                                <dd class="dark:text-white">Every {{ $plant->watering_frequency }} days</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500 dark:text-gray-400">Harvest Type</dt>
                                <dd class="dark:text-white">{{ $plant->harvest_type === 'single' ? 'Harvest Once' :
                                    'Harvest Multiple Times' }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500 dark:text-gray-400">Seeding Period</dt>
                                <dd class="dark:text-white">{{ $plant->days_to_grow }} days</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-500 dark:text-gray-400">Time to Harvest</dt>
                                <dd class="dark:text-white">Around {{ $plant->days_to_harvest }} days</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="mt-6 pt-6 border-t border-red-500/30">
                        <flux:heading class="text-xl font-bold text-red-600 dark:text-red-400">Danger Zone
                        </flux:heading>
                        <flux:text class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                            Warning: Deleting this plant template will also delete all pots in your garden that use this
                            plant.
                        </flux:text>
                        <form method="POST" action="{{ route('plants.destroy', $plant) }}" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
                                onclick="return confirm('Are you sure? This will delete the \'{{ $plant->name }}\' template AND all pots in your garden that use it.')">
                                Delete This Plant Template
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>