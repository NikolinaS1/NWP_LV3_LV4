@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper create_project">
                <h1 class="text-center">Edit Project</h1>
                <form method="POST" action="{{ route('project.edit_project_user', $project->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <h5>Name: {{ $project->name }}</h5>
                    </div>

                    <div class="form-group mb-4">
                        <h5>Description: {{ $project->description }}</h5>
                    </div>

                    <div class="form-group mb-4">
                        <h5>Price: {{ $project->price }}</h5>
                    </div>

                    <div class="form-group mb-4">
                        <label for="completed_jobs">Completed jobs:</label>
                        <select name="completed_jobs" id="completed_jobs" required class="form-control">
                            <option value="Yes" {{ $project->completed_jobs === 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $project->completed_jobs === 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <h5>Start date: {{ $project->start_date }}</h5>
                    </div>

                    <div class="form-group mb-4">
                        <h5>End date: {{ $project->end_date }}</h5>
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 90px;">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
