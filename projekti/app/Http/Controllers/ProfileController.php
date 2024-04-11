<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //show() prikazuje profil korisnika
    //Ovdje su izlistani projekti koje je korisnik stvorio kao menadžer, kao i projekti na kojima je korisnik član tima

     public function show() 
    {
        $user = Auth::user();
        $userProjects = Project::where('manager_id', $user->id)->get();
        $userTeamProjects = Project::whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();        

        return view('projects.profile', compact('userProjects', 'userTeamProjects'));
    }
}
