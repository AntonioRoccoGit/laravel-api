@extends('layouts.admin')
@section('content')
    @include('partials.session-message')
    <div class="container mt-4 d-flex justify-content-center">
        <table class="table table-dark align-middle rounded-2 w-25">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Ispeziona/Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr style="height: 80px">
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->title }}</td>
                        
                        <td>
                            <div class="btn-group justify-content-center w-100">

                                <a class="btn btn-success" href="{{ route('admin.types.show', $type->slug) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('admin.types.edit', $type->slug) }}">
                                    <i class="fa-solid fa-glasses"></i>
                                </a>

                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" element-title="{{ $type->title }}"
                                    class="btn btn-danger ms_delete_btn"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @include('partials.delete_modal')

    </div>
@endsection
