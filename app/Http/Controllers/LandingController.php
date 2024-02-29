<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Announcement;
use App\Http\Requests\StoreLandingRequest;
use App\Http\Requests\UpdateLandingRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $announcements = Announcement::with('skills')->get();
    //     $skills = Skill::all();
    //     return view('welcome', compact('announcements', 'skills'));
    // }


    function index()
    {

        $annonces = [];

        $annoncesAll = Announcement::with('skills')->get();

        foreach ($annoncesAll as $annonce) {

            $userCount = User::join('skill_user', 'users.id', '=', 'skill_user.user_id')
                ->join('skills', function ($join) {
                    $join->on('skills.id', '=', 'skill_user.skill_id');
                    $join->on('users.id', '=', 'skill_user.user_id');
                })
                ->join('announcement_skill', function ($join) {
                    $join->on('announcement_skill.skill_id', '=', 'skills.id');
                })
                ->join('announcements', 'announcements.id', '=', 'announcement_skill.announcement_id')
                ->where('users.id', auth()->id())
                ->where('announcements.id', $annonce->id)
                ->count();

            $annonceCount = Announcement::join('announcement_skill', 'announcements.id', '=', 'announcement_skill.announcement_id')
                ->join('skills', 'skills.id', '=', 'announcement_skill.skill_id')
                ->where('announcements.id', $annonce->id)
                ->count();
            if ($annonceCount) {
                if (($userCount / $annonceCount) >= 0.5) {
                    array_push($annonces, $annonce);
                }
            }
        }
        return view('welcome', compact('annonces'));
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
    public function store(StoreLandingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Landing $landing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Landing $landing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLandingRequest $request, Landing $landing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Landing $landing)
    {
        //
    }
}