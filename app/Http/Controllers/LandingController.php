<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Announcement;
use App\Http\Requests\StoreLandingRequest;
use App\Http\Requests\UpdateLandingRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user's skills
            $userSkills = Auth::user()->skills->pluck('id')->toArray();

            // Get announcements with matching skills
            $announcements = Announcement::with('skills')
                ->whereHas('skills', function ($query) use ($userSkills) {
                    $query->whereIn('id', $userSkills);
                })
                ->get();
        } else {
            // User is not authenticated, show all announcements
            $announcements = Announcement::all();
        }

        $skills = Skill::all();

        return view('welcome', compact('announcements', 'skills'));
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