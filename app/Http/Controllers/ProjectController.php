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
        $user = Auth::user();
        $projects = Project::orderBy('id', 'asc')->get();

        $idModulSelesai = UserModulProgress::where('user_id', $user->id)->pluck('modul_id')->flip();
        $ModulsinCategory = Modul::select('id', 'category_id')
            ->get()
            ->groupBy('category_id');

        $SelesaiProjectSebelumnya = true;
        foreach ($projects as $project) {
            $sudahUpload = UploadProject::where('user_id', $user->id)->where('projectId', $project->id)->exists();
            $sudahEvaluasi = ValidationAttemp::where('user_id', $user->id)->where('project_id', $project->id)->whereHas('answers')->exists();

            if ($project->id == 1) {
                $project->project_selesai = $sudahUpload;
            } else {
                $project->project_selesai = $sudahUpload && $sudahEvaluasi;
            }

            $modulesCompleted = false; // Default: belum selesai
            if (isset($ModulsinCategory[$project->category_id])) {
                $requiredModulIds = $ModulsinCategory[$project->category_id]->pluck('id');

                $modulesCompleted = $requiredModulIds->every(function ($modulId) use ($idModulSelesai) {
                    return isset($idModulSelesai[$modulId]);
                });
            } else {
                $modulesCompleted = true;
            }

            if ($project->id == 1) {
                $project->project_bisa_akses = $SelesaiProjectSebelumnya;
            } else {
                $project->project_bisa_akses = $SelesaiProjectSebelumnya && $modulesCompleted;
            }
            $SelesaiProjectSebelumnya = $project->project_selesai;
        }
        return view('daftarProject', ['projects' => $projects]);
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
        $user = Auth::user();
        $sudahUpload = UploadProject::where('user_id', $user->id)->where('projectId', $project->id)->exists();

        return view('lihatProject', [
            'project' => $project,
            'sudahUpload' => $sudahUpload,
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
