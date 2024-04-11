<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', function() {
    return view('projects.profile');
});

Route::get('/create', function() {
    return view('projects.create');
});

Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/profile', [ProfileController::class, 'show'])->name('projects.profile');

Route::get('/edit-project/{id}', function($id) {
    $project = \App\Models\Project::findOrFail($id);
    return view('projects.edit_project', ['project' => $project]);
});

Route::get('/edit-project-user/{id}', function($id) {
    $project = \App\Models\Project::findOrFail($id);
    return view('projects.edit_project_user', ['project' => $project]);
});

Route::put('/edit-project/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.edit_project');
Route::put('/projects.edit_project_user/{id}', [App\Http\Controllers\ProjectController::class, 'updateJobs'])->name('project.edit_project_user');

Route::get('/addTeam/{id}', function ($id){
    $project= \App\Models\Project::findOrFail($id);
    return view('projects.addTeam', ['project' => $project]);
})->name('project.addTeam');


Route::get('/addTeam/{id}', [ProjectController::class, 'addTeam'])->name('project.addTeam');

Route::post('/saveTeam/{id}', [ProjectController::class, 'saveTeam'])->name('projects.saveTeam');

