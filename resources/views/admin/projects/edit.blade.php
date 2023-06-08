@extends('layouts.admin')

@section('content')
    <div class="container mt-4 w-50 m-auto">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <h4 class="text-center">Modifica repository</h4>
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ old('title', $project->title) }}"
                    class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Categoria</label>
                <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example" name="type_id" id="type_id">
                    <option selected>Seleziona una categoria</option>
                    @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type?->id)) value="{{$type->id}}">{{$type->title}}</option>
                        
                    @endforeach
                   
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
           
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ old('description', $project->description) }} </textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project_last_updated" class="form-label">Ultimo aggiornamento della repository</label>
                <input type="date" value="{{ old('project_last_updated', $project->project_last_updated) }}"
                    class="form-control @error('project_last_updated') is-invalid @enderror" id="project_last_updated"
                    name="project_last_updated">
                @error('project_last_updated')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-100 text-end">
                <a href="{{ url()->previous() }}" class="btn btn-warning"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
            </div>
            
        </form>
        @include('partials.delete_modal')
    </div>
@endsection
