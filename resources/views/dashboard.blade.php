<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl p-4">
        <div>
            <flux:heading level="2" class="text-xl font-bold mb-3 dark:text-white">Garden Overview</flux:heading>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 bg-white dark:bg-zinc-700 rounded-lg shadow-lg">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pots</div>
                    <div class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                        {{ $potCount }}
                    </div>
                </div>
                <div class="p-4 bg-white dark:bg-zinc-700 rounded-lg shadow-lg">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Plant Varieties</div>
                    <div class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                        {{ $plantVarietyCount }}
                    </div>
                </div>
                <div class="p-4 bg-white dark:bg-zinc-700 rounded-lg shadow-lg">
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Planted This Week</div>
                    <div class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">
                        {{ $recentlyPlantedCount }}
                    </div>
                </div>

            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-zinc-700 p-4 rounded-lg shadow-lg">
                <flux:heading level="2" class="text-xl font-bold mb-3 dark:text-white">To-Do-List: Watering
                </flux:heading>
                <div class="space-y-2">
                    @forelse ($wateringTasks as $task)
                    <div class="flex justify-between items-center">
                        <span class="dark:text-gray-200">
                            Water <strong>{{ $task->name }}</strong> ({{ $task->plant->name }})
                        </span>
                        <form method="POST" action="{{ route('pots.water', $task) }}">
                            @csrf
                            <flux:button type="submit" variant="primary" color="blue">
                                Water
                            </flux:button>
                        </form>
                    </div>
                    @empty
                    <flux:text class="text-gray-500 dark:text-gray-400">All plants are watered!</flux:text>
                    @endforelse
                </div>
            </div>
            <div class="bg-white dark:bg-zinc-700 p-4 rounded-lg shadow-lg">
                <flux:heading level="2" class="text-xl font-bold mb-3 dark:text-white">To-Do-List: Harvest
                </flux:heading>
                <div class="space-y-2">
                    @forelse ($harvestTasks as $task)
                    <div class="flex justify-between items-center">
                        <span class="dark:text-gray-200">
                            Harvest <strong>{{ $task->name }}</strong> ({{ $task->plant->name }})
                        </span>
                        @php
                        $buttonText = $task->plant->harvest_type === 'single' ? 'Harvest & Remove' : 'Harvest';
                        @endphp
                        <form method="POST" action="{{ route('pots.harvest', $task) }}">
                            @csrf
                            <flux:button type="submit" variant="primary" color="green">
                                {{ $buttonText }}
                            </flux:button>
                        </form>
                    </div>
                    @empty
                    <flux:text class="text-gray-500 dark:text-gray-400">Nothing ready to harvest</flux:text>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>