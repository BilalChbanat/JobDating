<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create()
    {
        $skills = Skill::all();
        return view('users.create', compact('skills'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $skills = Skill::all();
        return view('users.edit', compact('user', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->back()->with('status', 'Profile updated successfully');
    }


    public function addSkills(Request $request)
    {
        $request->validate([
            'skills' => 'array',
        ]);

        $user = User::findOrFail($request->user_id);

        // Associate skills with the User
        $user->skills()->sync($request->skills);

        return redirect()->back()->with('status', 'Skills added successfully');
    }



}