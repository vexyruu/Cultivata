<x-layouts.app :title="__('Add a New Pot')">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-lg">
            <div class="mb-6">
                <flux:heading level="1" class="text-2xl font-bold text-gray-900 dark:text-white">
                    Add a New Pot to Your Garden
                </flux:heading>
                <flux:text class="mt-2 text-gray-600 dark:text-neutral-400">
                    Choose a plant from your library and tell us where you're planting it
                </flux:text>
            </div>
            <form method="POST" action="{{ route('pots.store') }}">
                @csrf
                <div class="space-y-5">
                    <flux:select name="plant_id" :label="__('Plant Type')" required>
                        <option value="" disabled selected>Select a plant</option>
                        @foreach($plantTypes as $plant)
                        <option value="{{ $plant->id }}" @selected(old('plant_id')==$plant->id)>
                            {{ $plant->name }}
                        </option>
                        @endforeach
                    </flux:select>
                    <flux:input name="name" :label="__('Pot / Plot Name')" :placeholder="__('e.g., Balcony Pot #1')"
                        required />
                    <flux:input name="location" :label="__('Location')" :placeholder="__('e.g., Back Balcony')"
                        required />
                    <flux:input name="planting_date" type="date" :label="__('Planting Date')"
                        :value="old('planting_date', now()->format('Y-m-d'))" required />
                    <div class="flex justify-end pt-2">
                        <flux:button type="submit" variant="primary" color="green" icon="check">
                            {{ __('Save Pot') }}
                        </flux:button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>