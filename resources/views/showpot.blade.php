<x-layouts.app :title="$pot->name">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-4xl">
            <flux:button href="{{ route('garden') }}" variant="ghost">
                &larr; Back to Garden
            </flux:button>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="md:col-span-2 overflow-Fluxidden rounded-xl border border-neutral-200 dark:border-neutral-700 sFluxadow-lg">
                    <div class="p-6 bg-white dark:bg-zinc-800">
                        <flux:heading level="1" size="xl" class="text-3xl font-bold dark:text-white">{{ $pot->name }}
                        </flux:heading>
                        <flux:text class="mt-1 text-lg text-gray-600 dark:text-gray-400">Location: {{ $pot->location }}
                        </flux:text>
                        <div class="mt-6 pt-4 border-t border-neutral-200 dark:border-neutral-700">
                            <flux:heading level="3" class="text-xl font-bold dark:text-white">Plant Information
                            </flux:heading>
                            <dl class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Plant Type</dt>
                                    <dd class="dark:text-white">{{ $pot->plant->name ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Planted On</dt>
                                    <dd class="dark:text-white">{{ $pot->planting_date->format('F d, Y') }}</Tdd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Status</dt>
                                    <dd class="dark:text-white">{{ $pot->computed_status }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Last Watered</dt>
                                    <dd class="dark:text-white">{{ $pot->last_watered_at ?
                                        $pot->last_watered_at->diffForHumans() : 'Never' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-medium text-gray-500 dark:text-gray-400">Last Harvested</dt>
                                    <dd class="dark:text-white">{{ $pot->last_harvested_at ?
                                        $pot->last_harvested_at->diffForHumans() : 'Never' }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-1">
                    <div class="bg-white dark:bg-zinc-700 p-4 rounded-lg shadow-lg">
                        <flux:heading level="2" class="text-xl font-bold mb-3 dark:text-white">Tasks</flux:heading>
                        <div class="space-y-4">
                            @if($isWateringDue)
                            <div class="flex justify-between items-center">
                                <span class="dark:text-gray-200">Needs Watering</span>
                                <form method="POST" action="{{ route('pots.water', $pot) }}">
                                    @csrf
                                    <flux:button type="submit" variant="primary" color="blue" size="xs">
                                        Water
                                    </flux:button>
                                </form>
                            </div>
                            @else
                            <flux:text size="lg" class="text-gray-500 dark:text-gray-400">Watered recently.</flux:text>
                            @endif
                            @if($isHarvestDue)
                            <div class="flex justify-between items-center">
                                <span class="dark:text-gray-200">Ready to Harvest!</span>
                                <form method="POST" action="{{ route('pots.harvest', $pot) }}">
                                    @csrf
                                    <flux:button type="submit" variant="primary" color="green" size="xs">
                                        Harvest
                                    </flux:button>
                                </form>
                            </div>
                            @else
                            <flux:text size="lg" class="text-gray-500 dark:text-gray-400">Not yet ready to harvest
                            </flux:text>
                            @endif
                        </div>
                        <div class="mt-6 pt-6 border-t border-red-500/30">
                            <flux:heading level="3" class="text-xl font-bold text-red-600 dark:text-red-400">Danger Zone
                            </flux:heading>
                            <flux:text class="mt-1 text-sm text-gray-600 dark:text-neutral-400">
                                Be careful, this action cannot be undone.
                            </flux:text>
                            <form method="POST" action="{{ route('pots.destroy', $pot) }}" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
                                    onclick="return confirm('Are you sure you want to delete this pot? This action cannot be undone.')">
                                    Delete This Pot
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>