<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\UploadProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\Storage;

class UploadProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $fileSebelumnya = $project->files()->where('user_id', Auth::user()->id)
            ->latest()->first();
        return view('uploadProject', [
            'project' => $project,
            'file' => $fileSebelumnya
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        if ($request->file('progress')) {
            $request->validate([
                'progress' => 'required|file|max:10240',
            ]);
            $file = $request->file('progress');
            $nameFile = $file->getClientOriginalName();
            $path = $file->store('files', 'public');
            $project->files()->create([
                'nama_file' => $nameFile,
                'path' => $path,
                'user_id' => Auth::user()->id,
                'projectId' => $project->id,
            ]);

            return back()->with('Berhasil', 'File Berhasil di upload');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('uploadProject', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadProject $uploadProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadProject $uploadProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadProject $uploadProject)
    {
        //
    }
}
