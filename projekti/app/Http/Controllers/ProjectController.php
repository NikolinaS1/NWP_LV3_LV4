<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    //Ova funkcija stvara novi projekt s podacima dobivenim iz zahtjeva i trenutno prijavljenog korisnika postavlja kao menadžera projekta
    //Validacija osigurava da su svi potrebni podaci prisutni prije spremanja

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'completed_jobs' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $user = Auth::user();

        $project = new Project();
        $project->manager_id = $user->id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->completed_jobs = $request->completed_jobs;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();

        return redirect()->route('projects.profile')->with('success', 'Project created successfully!');
    }

    //Ova funkcija prikazuje obrazac za uređivanje projekta ako je trenutno prijavljeni korisnik menadžer projekta ili ako je član projekta
    //U suprotnom, korisnik se preusmjerava na profil 

    public function edit($projectId)
    {
        $project = Project::findOrFail($projectId);
        

        if (auth()->user()->id === $project->manager_id) {
            return view('projects.edit_project', compact('project'));
        }

        if ($project->users->contains(auth()->user()->id)->get()) {
            return view('projects.edit_project_user', compact('project'));
        }

        return redirect()->route('projects.profile')->with('error', 'You do not have permission to edit this project.');
    }

    //Ova funkcija omogućuje uređivanje projekta ako je trenutno prijavljeni korisnik član projekta
    //Ima mogućnost promjene samo completed_jobs vrijednosti
    //Validacija osigurava da su svi potrebni podaci prisutni prije spremanja
    //Nakon ažuriranja, korisnik se preusmjerava na profil 

    public function updateJobs(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);

        if ($project->users->contains(auth()->user()->id)) {
            $request->validate([
                'completed_jobs' => 'required|string',
            ]);

            $project->update([
                'completed_jobs' => $request->completed_jobs,
            ]);

            $project->save();

            return redirect()->route('projects.profile')->with('success', 'Completed jobs updated successfully!');
        }

        return redirect()->route('projects.profile')->with('error', 'You do not have permission to edit this project.');
    }

    //Ova funkcija omogućuje uređivanje projekta ako je trenutno prijavljeni korisnik menadžer projekta
    //Može sve mijenjati
    //Validacija osigurava da su svi potrebni podaci prisutni prije spremanja
    //Nakon ažuriranja, korisnik se preusmjerava na profil projekta 

    public function update(Request $request, $projectId) {
        $project = Project::findOrFail($projectId);

        if (auth()->user()->id === $project->manager_id) {
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'completed_jobs' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            $project->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'completed_jobs' => $request->completed_jobs,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            $project->save();

            return redirect()->route('projects.profile')->with('success', 'Project updated successfully!');
        }
    }

    //Ova funkcija prikazuje obrazac za dodavanje članova tima projektu, zajedno s popisom svih korisnika

    public function addTeam($id)
    {
        $project = Project::findOrFail($id);
        $users = User::all();
        return view('projects.addTeam', compact('project', 'users'));
    }

    //Ova funkcija sprema odabrane korisnike kao članove tima projekta i preusmjerava korisnika na profil

    public function saveTeam(Request $request, $projectId)
    {
       $project = Project::findOrFail($projectId);
       $users = $request->input('users');
       $project->users()->attach($users);
       return redirect()->route('projects.profile')->with('success', 'Users added successfully!');
    } 
}
