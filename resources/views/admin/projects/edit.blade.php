@extends('layouts.admin')

@section('content')
    <div class="container mt-4 w-50 m-auto">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <h4 class="text-center">Modifica la repository</h4>
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ $project->title }}" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" value="{{ $project->description }}" class="form-control" id="description"
                    name="description">
            </div>
            <div class="mb-3">
                <label for="project_last_updated" class="form-label">Descrizione</label>
                <input type="date" value="{{ $project->project_last_updated }}" class="form-control"
                    id="project_last_updated" name="project_last_updated">
            </div>

            <div class="w-100 text-end">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-warning"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
            </div>

        </form>
    </div>
@endsection
