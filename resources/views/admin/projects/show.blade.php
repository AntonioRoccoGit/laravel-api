@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100 w-100">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                <p class="card-text">{{ $project->description }}</p>
                <a href="#" class="card-link">Card link</a>
                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
