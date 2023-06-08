@extends('layouts.admin')

@section('content')
    @include('partials.session-message')

    <div class="container d-flex align-items-center justify-content-center h-100 w-100">

        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">{{ $type->title }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Url: {{ $type->slug }}</h6>
                
                <div class="d-flex justify-content-end">

                    <a href="{{ url()->previous() }}" class="btn btn-warning"><i
                            class="fa-solid fa-arrow-left"></i></a>

                </div>
            </div>
        </div>
    </div>
@endsection