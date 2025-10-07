<?php

namespace App\Http\Controllers;

use App\Models\ValidationQuestion;
use Illuminate\Http\Request;
use App\Models\Project;
use Symfony\Component\Console\Question\Question;

class ValidationQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validation = ValidationQuestion::all();

        return view('validasiProgress', ['validasi' => $validation]);
    }

    public function validasi(Project $project)
    {
        $questions = $project->questions()->get();
        return view('validasiProgress', [
            'project' => $project,
            'questions' => $questions
        ]);
    }

    public function showAll(Project $project)
    {
        $materials = $project->project_materials()->with([
            'questions' => function ($query) {
                // Urutkan soal berdasarkan tipe ('multiple' dulu)
                $query->orderByRaw("FIELD(type, 'multiple', 'essay')");
            },
            // Kita tetap perlu eager load options untuk soal-soal tersebut
            'questions.options'
        ])->orderBy('urutan')->get();
        return view('validasiProgress', [
            'project' => $project,
            'materials' => $materials,
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
    public function show(ValidationQuestion $validationQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ValidationQuestion $validationQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ValidationQuestion $validationQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ValidationQuestion $validationQuestion)
    {
        //
    }
}
