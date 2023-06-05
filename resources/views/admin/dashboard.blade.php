@extends('layouts.app')

@section('content')
    <div class="mc-wrapper d-flex">

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse ">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        asasas
                        {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a> --}}
                    </li>
                    <li class="nav-item">
                        saasassa
                        {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.posts.index' ? 'bg-secondary' : '' }}"
                href="{{ route('admin.posts.index') }}">
                <i class="fa-regular fa-folder-open"></i> Post
            </a> --}}
                    </li>
                </ul>


            </div>
        </nav>

        <div class="container">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Dashboard') }}
            </h2>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Dashboard di {{ Auth::user()->name }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
