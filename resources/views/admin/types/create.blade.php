@extends('layouts.admin')

@section('content')
    <div class="container mt-4 w-50 m-auto">
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <h4 class="text-center">Aggiungi una tecnologia</h4>
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-100 text-end">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-warning"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
            </div>

        </form>
    </div>
@endsection
