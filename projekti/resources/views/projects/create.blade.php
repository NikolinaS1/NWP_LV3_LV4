@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper create_project">
                <h1 class="text-center">Create new project</h1>
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Project name:</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="5" required class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" required class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="completed_jobs">Completed jobs:</label>
                        <select name="completed_jobs" id="completed_jobs" required class="form-control">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start date:</label>
                        <input type="date" name="start_date" id="start_date" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="end_date">End date:</label>
                        <input type="date" name="end_date" id="end_date" required class="form-control">
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 90px;">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
