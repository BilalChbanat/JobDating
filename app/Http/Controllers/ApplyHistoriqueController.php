<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApplyHistoriqueController extends Controller
{
    public function index()
    {
        $users = User::has('announcements')->with('announcements')->get();
        return view('historique.index', compact('users'));
    }
}
