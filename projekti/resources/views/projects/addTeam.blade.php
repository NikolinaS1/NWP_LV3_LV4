@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="mt-5">
                <h3>Projects you own</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.saveTeam', $project->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="users">Team members:</label>
                        <select name="users[]" id="users" multiple required class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Add team</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
