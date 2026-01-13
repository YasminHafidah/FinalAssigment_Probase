@php
    $user = $getRecord();
    $steps = [];

    if ($user) {
        try {
            // Eager load relasi untuk performa
            $user->load(['uploads', 'validations']);

            // Array steps (7 langkah, sesuaikan project_id dengan DB Anda)
            $projects = [
                ['name' => 'Upload Ide', 'color' => '#ef4444', 'type' => 'upload', 'project_id' => 1], // Merah (#ef4444 = bg-red-500)
                ['name' => 'Conceptual (Upload)', 'color' => '#f97316', 'type' => 'upload', 'project_id' => 2], // Oranye (#f97316 = bg-orange-500)
                ['name' => 'Conceptual (Validasi)', 'color' => '#f59e0b', 'type' => 'validation', 'project_id' => 2], // Amber (#f59e0b = bg-amber-400)
                ['name' => 'Logical (Upload)', 'color' => '#eab308', 'type' => 'upload', 'project_id' => 3], // Kuning (#eab308 = bg-yellow-400)
                ['name' => 'Logical (Validasi)', 'color' => '#84cc16', 'type' => 'validation', 'project_id' => 3], // Lime (#84cc16 = bg-lime-400)
                ['name' => 'Physical (Upload)', 'color' => '#22c55e', 'type' => 'upload', 'project_id' => 4], // Hijau muda (#22c55e = bg-green-400)
                ['name' => 'Physical (Validasi)', 'color' => '#16a34a', 'type' => 'validation', 'project_id' => 4], // Hijau tua (#16a34a = bg-green-600)
            ];

            $SelesaiSteps = collect($projects)->map(function ($step) use ($user) {
                $done = false;
                if ($step['type'] === 'upload') {
                    $done = $user->uploads()->where('projectId', $step['project_id'])->exists();
                } elseif ($step['type'] === 'validation') {
                    $done = $user->validations()->where('project_id', $step['project_id'])->exists();
                }
                return array_merge($step, ['done' => $done]);
            });
            $totalSteps = $SelesaiSteps->count();
            $completedSteps = $SelesaiSteps->where('done', true)->count();
            $percentage = $totalSteps > 0 ? round(($completedSteps / $totalSteps) * 100) : 0;

            $colorList = $SelesaiSteps
                ->map(function ($step) {
                    return $step['done'] ? $step['color'] : '#d1d5db';
                })
                ->implode(', ');

            $gradientStyle = 'linear-gradient(to right, ' . $colorList . ')';
        } catch (Exception $e) {
            $gradientStyle = 'linear-gradient(to right, #d1d5db, #d1d5db)';
        }
    }

@endphp
<div style="position: relative; width: 100%; display: flex; align-items: center; gap: 12px;">
    {{-- progress bar --}}
    <div
        style="flex-grow: 1; height: 16px; border-radius: 9999px; background: {{ $gradientStyle }}; border: 1px solid #e5e7eb;">
    </div>
    {{-- Teks Counter --}}
    <div style="flex-shrink: 0; font-size: 0.875rem; color: #4b5563; white-space: nowrap;">
        <strong>{{ $completedSteps }} / {{ $totalSteps }}</strong> ({{ $percentage }}%)
    </div>
</div>
