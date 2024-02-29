<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requiredskill = Skill::withCount('announcements')->orderByDesc('announcements_count')->first();
        $skill = $requiredskill->skill;

        $announcements = Announcement::get();
        return view('announcements.show', compact('announcements','skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('announcements.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'post' => 'required|max:255|string',
            'img' => 'nullable|mimes:png,jpeg,jpg,webp',
            'description' => 'required|string',
            'skills' => 'array',
        ]);

        $path = 'uploads/announcements/';
        $fileName = null;

        if ($request->has('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $file->move($path, $fileName);
        }

        $announcement = Announcement::create([
            'title' => $request->title,
            'post' => $request->post,
            'img' => $fileName ? $path . $fileName : null,
            'description' => $request->description,
        ]);

        // Associate skills with the announcement
        $announcement->skills()->sync($request->skills);

        return redirect('announcements/create')->with('status', 'Announcement has been published');
    }


    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'post' => 'required|max:255|string',
            'img' => 'nullable|mimes:png,jpeg,webp,jpg',
            'description' => 'required|max:255|string',
        ]);

        $announcement = Announcement::findOrFail($id);

        if ($request->has('img')) {

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $path = 'uploads/announcements/';
            $file->move($path, $fileName);

            if (File::exists($announcement->img)) {
                File::delete($announcement->img);
            }
        }

        $announcement->update([
            'title' => $request->title,
            'post' => $request->post,
            'img' => $path . $fileName,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('status', 'Announcement updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->back()->with('status', 'Announcement Deleted Successfully');

    }

    public function apply(int $announcementId)
    {
        // Ensure the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $announcement = Announcement::findOrFail($announcementId);

            // Attach the authenticated user to the announcement
            $user->announcements()->attach($announcement);

            return redirect()->back()->with('status', 'Application submitted successfully');
        }

        // Redirect to login if the user is not authenticated
        return redirect()->route('login')->with('status', 'Please login to apply');
    }

    }