<div class="block rounded-xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg 
            hover:shadow-2xl hover:-translate-y-1 
            transition-all duration-200 ease-in-out">
    <div class="relative aspect-video">
        <img src="https://www.pixcrafter.com/wp-content/uploads/2024/03/cartoon-style-indoor-plant-vector-illustration.jpg"
            alt="{{ $plant->name }}" class="w-full h-full object-cover" />
    </div>
    <div class="p-3 bg-white dark:bg-zinc-800">
        <h2 class="text-base font-bold dark:text-white truncate">{{ $plant->name }}</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 truncate">
            {{ $plant->description ?? 'No description provided.' }}
        </p>
        <div class="card-actions justify-end mt-2">
            <flux:button href="{{ route('plants.show', $plant) }}" variant="primary" color="green">
                See Details
            </flux:button>
        </div>
    </div>
</div>