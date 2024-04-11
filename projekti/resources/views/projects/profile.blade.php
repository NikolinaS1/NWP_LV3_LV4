@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5 ml-3">
        <h2>Profile</h2>
    </div>
    <div class="mt-3 ml-3">
        <a class="btn btn-primary" href="{{ url('/create') }}">{{ __('Create new project') }}</a>
    </div>
    <h3 class="mt-5">Projects you own</h3>
    <div class="mt-3 ml-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Completed Jobs</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userProjects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->price }}</td>
                    <td>{{ $project->completed_jobs }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td><a href="{{ url('/edit-project', ['id' => $project->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/addTeam', ['id' => $project->id]) }}" class="btn btn-success">Add team</a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h3 class="mt-5">Projects you are part of</h3>
    <div class="mt-3 ml-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Completed Jobs</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userTeamProjects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->price }}</td>
                    <td>{{ $project->completed_jobs }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td><a href="{{ url('/edit-project-user', ['id' => $project->id]) }}" class="btn btn-primary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
