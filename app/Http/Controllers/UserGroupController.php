<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function redirectToGroupMeet()
    {
        $user = Auth::user();
        $userGroup = UserGroup::where('user_id', $user->id)->first();
        if (!$userGroup) {
            return redirect()->back()->with('error', 'Kamu belum tergabung dalam kelompok.');
        }
        $group = $userGroup?->group;
        if (!$group || !$group->meet) {
            return redirect()->back()->with('error', 'Link Google Meet belum diatur untuk kelompokmu.');
        }

        return redirect()->away($group->meet);
    }

    public function showMyGroup()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $group = $user->kelompok()->with('user')->first();

        $namaGroup = null;
        $anggota = collect();

        if ($group) {
            $namaGroup = $group->group;
            $anggota = $group->user;
            $question  = $group->question;
        }

        return view('daftarKelompok', [
            'namaKelompok' => $namaGroup,
            'anggota' => $anggota,
            'user' => $user,
            'question' => $question
        ]);
    }

    public function index() {}

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
    public function show(UserGroup $userGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserGroup $userGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserGroup $userGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $userGroup)
    {
        //
    }
}
