@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <genre-index :genres="{{$genres}}"></genre-index>
            </div>
        </div>
    </div>
</div>
@endsection






{{-- <x-app-layout>
 <x-slot name="title">genres</x-slot>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('response'))
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-success text-center">
                            {{ Session::get('response') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">Generos Literarios</h3>
                    <a class="btn btn-success" href="{{ route('genre.new') }}"><i data-feather="plus-square"></i> Nuevo
                        Genero</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($genres)
                                    @foreach ($genres as $genre)
                                        <tr>
                                            <td>{{ $genre->id }}</td>
                                            <td>{{ $genre->name }}</td>
                                            <td>{{ $genre->description }}</td>
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('genre.edit', $genre->id) }}">
                                                    <i data-feather="edit"></i> Editar</a>
                                                <button class="btn btn-danger"
                                                    onclick="delete_value('{{ route('genre.delete', $genre) }}')">
                                                    <i data-feather="trash-2"></i> Borrar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
