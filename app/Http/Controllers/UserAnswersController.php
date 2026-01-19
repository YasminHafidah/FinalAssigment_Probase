<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\UploadProject;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use App\Models\ValidationAttemp;
use Illuminate\Support\Facades\Auth;


class UserAnswersController extends Controller
{
    public function showResult()
    {
        $user = Auth::user();
        // $cekData = ValidationAttemp::where('user_id', $user->id)
        //     ->where('project_id', 2) // Cek spesifik project Logical Design
        //     ->get();

        // dd([
        //     'ID User yang Login' => $user->id, // Cek angka ini! Apakah 1?
        //     'Apakah Data Ditemukan?' => $cekData->count(),
        //     'Isi Data' => $cekData
        // ]);
        $projects = Project::all();
        $laporan = $projects->map(function ($project) use ($user) {

            //nilai akhir project
            $submission = UploadProject::where('user_id', $user->id)
                ->where('projectId', $project->id)
                ->orderBy('nilai', 'desc')
                ->first();

            // Siapkan variabel untuk nilai dan notes project
            $nilaiProjectAkhir = $submission ? $submission->nilai : 0; // Jika belum upload, nilai 0
            $notesProjectAkhir = $submission ? $submission->notes : 'Belum ada notes';
            //riwayat pengerjaan
            $Attempts = ValidationAttemp::where('user_id', $user->id)
                ->where('project_id', $project->id)
                ->get();
            $riwayat = $Attempts->map(function ($attempt) {
                $nilai_pg = $attempt->score;
                $jawaban_essay = UserAnswer::where('validation_attemp_id', $attempt->id)
                    ->whereNotNull('essay_answer')
                    ->get();
                $kumpulan_feedback = $jawaban_essay->pluck('feedback')->filter()->implode('. ');
                if (empty($kumpulan_feedback)) {
                    $feedback = "Belum ada feedback.";
                } else {
                    $feedback = $kumpulan_feedback;
                }
                $total_nilai_essay = $jawaban_essay->sum('nilai_essay');
                $jumlah_essay = $jawaban_essay->count();
                if ($jumlah_essay > 0) {
                    $nilai_essay = $total_nilai_essay / $jumlah_essay;
                } else {
                    $nilai_essay = 0;
                }
                return [
                    'has_answers' => $attempt->answers()->count() > 0,
                    'date' => $attempt->completed_at,
                    'nilai_pg' => $nilai_pg,
                    'nilai_essay' => round($nilai_essay, 2),
                    'feedback' => $feedback,
                    'total' => ($nilai_pg + round($nilai_essay, 2)) / 2
                ];
            })->filter(fn($item) => $item['has_answers']);

            //cari nilai terbaik dari submitan siswa
            $bestAttempt = $riwayat->sortByDesc('total')->first();
            if (!$bestAttempt) {
                $bestAttempt = [
                    'nilai_pg' => 0,
                    'nilai_essay' => 0,
                    'total' => 0,
                    'feedback' => 'Belum ada feedback',
                    'date' => '-'
                ];
            }
            return [
                'id'           => $project->id,
                'project_title' => $project->title,
                'status'       => $riwayat->count() > 0 ? 'Selesai' : 'Belum',
                'attempt_count' => $riwayat->count(),
                'best'         => $bestAttempt,
                'riwayat'      => $riwayat,
                'nilai_project' => $nilaiProjectAkhir,
                'feedback_project' => $notesProjectAkhir
            ];
        });

        return view('lihatNilai', compact('laporan'));
    }
}
