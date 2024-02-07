<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use App\Models\Announcement;
use App\Http\Requests\StoreLandingRequest;
use App\Http\Requests\UpdateLandingRequest;
use App\Models\User;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::get();
        $user = User::class; // This line seems unnecessary, please review it
        return view('welcome', compact('announcements', 'user'));
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