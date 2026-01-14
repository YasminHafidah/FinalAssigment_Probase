<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\UploadProject;
use App\Models\ProjectMaterial;
use App\Models\ValidationAttemp;
use App\Models\UserModulProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $projects = Project::orderBy('id', 'asc')->get();

        $KKM = 75;

        $idModulSelesai = UserModulProgress::where('user_id', $user->id)->pluck('modul_id')->flip();
        $ModulsinCategory = Modul::select('id', 'category_id')
            ->get()
            ->groupBy('category_id');


        $SelesaiProjectSebelumnya = true;
        $StatusSebelumnya = 'LULUS'; // Default LULUS agar project 1 aman
        $EvaluasiSebelumnya = true;  // Default true agar project 1 aman
        $IdSebelumnya = 1;

        foreach ($projects as $project) {
            $upload = UploadProject::where('user_id', $user->id)
                ->where('projectId', $project->id)
                ->get();

            $sudahUpload = $upload->isNotEmpty();

            $nilai_tertinggi = $upload->max('nilai');

            if (!$sudahUpload) {
                $statusProject = 'BELUM_UPLOAD';
            } elseif ($nilai_tertinggi === null || $nilai_tertinggi < $KKM) {
                $statusProject = 'PERBAIKI'; // Sudah upload, tapi nilai masih NULL atau kurang dari KKM
            } else {
                $statusProject = 'LULUS'; // Nilai >= KKM
            }

            $sudahEvaluasi = ValidationAttemp::where('user_id', $user->id)->where('project_id', $project->id)->whereHas('answers')->exists();

            if ($project->id == 1) {
                $project->project_selesai = ($statusProject == 'LULUS');
            } else {
                $project->project_selesai = ($statusProject == 'LULUS') && $sudahEvaluasi;
            }

            //cek Modul
            if ($project->id == 1) {
                $modulesCompleted = true;
            } else {
                if (isset($ModulsinCategory[$project->category_id])) {
                    $requiredModulIds = $ModulsinCategory[$project->category_id]->pluck('id');

                    $modulesCompleted = $requiredModulIds->every(function ($modulId) use ($idModulSelesai) {
                        return isset($idModulSelesai[$modulId]);
                    });
                } else {
                    $modulesCompleted = true;
                }
            }

            //cek akses project
            if ($project->id == 1) {
                $project->project_bisa_akses = true;
            } else {
                $project->project_bisa_akses = $SelesaiProjectSebelumnya && $modulesCompleted;
            }

            $project->pesan = "";

            //kalau ga bisa akses
            if (!$project->project_bisa_akses) {
                // Cek 1: Apakah karena Modul?
                if (!$modulesCompleted) {
                    $project->pesan = "Akses Ditolak: Anda belum menyelesaikan semua materi modul di tahap ini.";
                }
                // Cek 2: Apakah karena Project Sebelumnya?
                elseif (!$SelesaiProjectSebelumnya) {
                    // Kita bedah status project sebelumnya:
                    if ($StatusSebelumnya == 'BELUM_UPLOAD') {
                        $project->pesan = "Akses Ditolak: Anda belum mengupload tugas pada project sebelumnya!";
                    } elseif ($StatusSebelumnya == 'PERBAIKI') {
                        $project->pesan = "Akses Ditolak: Project sebelumnya belum tuntas (Nilai dibawah KKM). Mohon perbaiki!";
                    } elseif ($StatusSebelumnya == 'LULUS') {
                        // Status Lulus, tapi kok belum selesai? Berarti Evaluasinya belum!
                        if ($IdSebelumnya != 1 && !$EvaluasiSebelumnya) {
                            $project->pesan = "Akses Ditolak: Anda belum mengerjakan Evaluasi (Validasi) pada project sebelumnya!";
                        }
                    }
                } else {
                    $project->pesan = "Selesaikan project sebelumnya terlebih dahulu.";
                }
            }
            $SelesaiProjectSebelumnya = $project->project_selesai;
            $StatusSebelumnya = $statusProject;
            $EvaluasiSebelumnya = $sudahEvaluasi;
            $IdSebelumnya = $project->id;
        }
        return view('daftarProject', [
            'projects' => $projects,
            ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $userGroup = $user->kelompok()->with('user')->first();
        $question = $userGroup ? $userGroup->question : null;

        $sudahUpload = UploadProject::where('user_id', $user->id)->where('projectId', $project->id)->exists();

        return view('lihatProject', [
            'project' => $project,
            'sudahUpload' => $sudahUpload,
            'question' => $question
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
