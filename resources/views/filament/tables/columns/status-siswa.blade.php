@php
    // Definisikan daftar step langsung di sini
    $projects = [
        ['name' => '1. Upload Ide', 'color' => '#ef4444'],
        ['name' => '2. Conceptual (Upload)', 'color' => '#f97316'],
        ['name' => '3. Conceptual (Validasi)', 'color' => '#f59e0b'],
        ['name' => '4. Logical (Upload)', 'color' => '#eab308'],
        ['name' => '5. Logical (Validasi)', 'color' => '#84cc16'],
        ['name' => '6. Physical (Upload)', 'color' => '#22c55e'],
        ['name' => '7. Physical (Validasi)', 'color' => '#16a34a'],
    ];
@endphp

<x-filament::card>
    <h2 class="text-lg font-medium text-gray-900 dark:text-white">
        Progress Project Siswa
    </h2>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-x-6 gap-y-2 text-sm text-gray-600 dark:text-gray-300">
        @foreach ($projects as $step)
            <div class="flex items-center space-x-2">
                <span class="block w-3 h-3 rounded-full" style="background-color: {{ $step['color'] }};"></span>
                <span>{{ $step['name'] }}</span>
            </div>
        @endforeach
    </div>
</x-filament::card>