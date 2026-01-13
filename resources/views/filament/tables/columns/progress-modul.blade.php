@php
    $selesai = $record->completed_modules_count ?? 0;
    $total = $total_modules ?? 0;
    $persentase = $total > 0 ? ($selesai / $total) * 100 : 0;
@endphp

<div class="w-full">
    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
        {{ $selesai }} / {{ $total }} Modul
    </span>
    <div class="mt-1 w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div class="bg-primary-600 h-2.5 rounded-full" style="width: {{ $persentase }}%"></div>
    </div>
</div>
