@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper create_project">
                <h1 class="text-center">Edit Project</h1>
                <form method="POST" action="{{ route('project.edit_project', $project->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Project name:</label>
                        <input type="text" name="name" id="name" required class="form-control" value="{{ $project->name }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="5" required class="form-control">{{ $project->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" required class="form-control" value="{{ $project->price }}">
                    </div>

                    <div class="form-group">
                        <label for="completed_jobs">Completed jobs:</label>
                        <select name="completed_jobs" id="completed_jobs" required class="form-control">
                            <option value="Yes" {{ $project->completed_jobs === 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $project->completed_jobs === 'No' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start date:</label>
                        <input type="date" name="start_date" id="start_date" required class="form-control" value="{{ $project->start_date }}">
                    </div>

                    <div class="form-group">
                        <label for="end_date">End date:</label>
                        <input type="date" name="end_date" id="end_date" required class="form-control" value="{{ $project->end_date }}">
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 90px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
