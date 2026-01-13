<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Category;
use App\Models\UserModulProgress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $idModulSelesai = UserModulProgress::where('user_id', $user->id)->pluck('modul_id')->flip();

        $urutkanModul = Modul::orderBy('category_id', 'asc')->orderBy('id', 'asc')->get(['id']);

        $statusAkses = [];

        $modulSelesaiSebelumnya = true;

        foreach ($urutkanModul as $modul) {
            $selesai = isset($idModulSelesai[$modul->id]);
            $statusAkses[$modul->id] = [
                'completed' => $selesai,
                'accessible' => $modulSelesaiSebelumnya,
            ];
            $modulSelesaiSebelumnya = $selesai;
        }

        $categories = Category::with(['moduls' => function ($query) {
            $query->orderBy('id', 'asc');
        }])->get();

        foreach ($categories as $category) {
            foreach ($category->moduls as $modul) {
                $status = $statusAkses[$modul->id] ?? ['completed' => false, 'accessible' => false];

                $modul->selesai = $status['completed'];
                $modul->akses = $status['accessible'];
            }
        }

        return view('daftarMateri', ['categories' => $categories]);
    }

    //  $projects = Project::orderBy('id', 'asc')->get();

    //     $SelesaiProjectSebelumnya = true;
    //     foreach ($projects as $project) {
    //         $sudahUpload = UploadProject::where('user_id', $user->id)->where('projectId', $project->id)->exists();
    //         $sudahEvaluasi = ValidationAttemp::where('user_id', $user->id)->where('project_id', $project->id)->whereHas('answers')->exists();


    //         if ($project->id == 1) {
    //             $project->project_selesai = $sudahUpload;
    //         } else {
    //             $project->project_selesai = $sudahUpload && $sudahEvaluasi;
    //         }
    //         $project->project_bisa_akses = $SelesaiProjectSebelumnya;
    //         $SelesaiProjectSebelumnya = $project->project_selesai;
    //     }


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
    public function show(Modul $materi)
    {
        return view('materi', ['modul' => $materi]);
    }

    public function selesai(Request $request, Modul $materi)
    {
        $user = Auth::user();

        $modulSelesai = UserModulProgress::where('user_id', $user->id)->where('modul_id', $materi->id)->first();
        if (!$modulSelesai) {
            UserModulProgress::create([
                'user_id' => $user->id,
                'modul_id' => $materi->id,
            ]);
        }
        return response()->json(['message' => 'Module marked as complete.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
    }
}
