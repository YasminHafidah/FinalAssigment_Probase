@php
    $modules = $record->completedModules;

    $groupedModules = $modules->groupBy('category.category');
@endphp

<div class="mt-4 space-y-4">
    <h3 class="text-lg font-bold mb-4 dark:text-white">
        Modul yang Telah Selesai
    </h3>

    @forelse($groupedModules as $categoryName => $modulesInCategory)

        <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">

            <div class="bg-gray-50 px-4 py-3 dark:bg-gray-800 mb-2">
                <h4 class="font-semibold text-gray-900 dark:text-white">
                    Kategori: {{ $categoryName ?: 'Lain-lain' }}
                </h4>
            </div>

            <div class="p-4">
                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 dark:text-gray-300 ml-4">
                    @foreach ($modulesInCategory as $module)
                        <li>{{ $module->title }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400">
            Siswa ini belum menyelesaikan modul apapun.
        </p>
    @endforelse
</div>
