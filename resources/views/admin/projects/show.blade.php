@extends('layouts.admin')

@section('content')
    @include('partials.session-message')

    <div class="container d-flex align-items-center justify-content-center h-100 w-100">

        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                @if ($project->type)
                <h6 class="card-subtitle mb-2 text-body-secondary">Categoria: {{ $project->type->title }}</h6>
                @else 
                <h6 class="card-subtitle mb-2 text-body-secondary">Nessuna categoria</h6>
                @endif
                <p>
                    <strong>Linguaggi: </strong>
                    @forelse ($project->technologies as $item)
                        {{$item->name}} {{$loop->last ? '' : ','}}
                    @empty
                        Nessun Linguaggio selezionato
                    @endforelse
                </p>
                <p class="card-text">{{ $project->description }}</p>
                <div class="d-flex justify-content-end">

                    <a href="{{ route('admin.projects.index') }}" class="btn btn-warning"><i
                            class="fa-solid fa-arrow-left"></i></a>

                </div>
            </div>
        </div>
    </div>
@endsection
