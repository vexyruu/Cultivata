<a href="{{ route('pots.show', $pot) }}" class="block rounded-xl border border-neutral-200 dark:border-neutral-700 overflow-hidden shadow-lg 
          hover:shadow-2xl hover:-translate-y-1 
          transition-all duration-200 ease-in-out">
    <div class="relative aspect-video">
        <img src="https://www.pixcrafter.com/wp-content/uploads/2024/03/cartoon-style-indoor-plant-vector-illustration.jpg"
            alt="{{ $pot->name }}" class="w-full h-full object-cover" />
    </div>
    <div class="p-3 bg-white dark:bg-zinc-800">
        <h2 class="text-base font-bold dark:text-white truncate">{{ $pot->name }}</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Plant: {{ $pot->plant->name ?? 'N/A' }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Status: {{ $pot->computed_status ?? 'N/A' }}
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Planted: {{ $pot->planting_date->format('d M Y') }}
        </p>
        @if($pot->is_watering_due)
        <div class="mt-2">
            <span
                class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900 px-2 py-0.5 text-xs font-medium text-blue-800 dark:text-blue-200">
                Needs Watering
            </span>
        </div>
        @endif
        @if($pot->harvest_due)
        <div class="mt-1">
            <span
                class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900 px-2 py-0.5 text-xs font-medium text-green-800 dark:text-green-200">
                Ready to Harvest
            </span>
        </div>
        @endif
    </div>
</a>