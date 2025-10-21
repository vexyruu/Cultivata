<x-layouts.app :title="__('Add a New Plant')">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-lg">
            <div class="mb-6">
                <flux:heading level="1" class="text-2xl font-bold text-gray-900 dark:text-white">
                    Add a New Plant to Your Library
                </flux:heading>
                <flux:text class="mt-2 text-gray-600 dark:text-neutral-400">
                    This adds a plant template to the plant library
                </flux:text>
            </div>
            <form method="POST" action="{{ route('plants.store') }}" class="mt-6">
                @csrf
                <div class="space-y-5">
                    <flux:input name="name" :label="__('Plant Name')" required />
                    <flux:input name="watering_frequency" type="number" :label="__('Watering Frequency (in days)')"
                        required />
                    <flux:input name="days_to_harvest" type="number" :label="__('Days to Harvest')" required />
                    <flux:input name="days_to_grow" type="number" :label="__('Days to grow')"
                        :value="old('days_to_grow', 0)" required />
                    <flux:select name="harvest_type" :label="__('Harvest Type')" required>
                        <option value="single" @selected(old('harvest_type')=='single' )>
                            Harvest Once
                        </option>
                        <option value="continuous" @selected(old('harvest_type')=='continuous' )>
                            Continous Harvest
                        </option>
                    </flux:select>
                    <flux:textarea name="description" :label="__('Description (Optional)')" :rows="3" />
                    <div class="flex justify-end pt-2">
                        <flux:button type="submit" variant="primary" color="green" icon="check">
                            {{ __('Save Plant') }}
                        </flux:button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>