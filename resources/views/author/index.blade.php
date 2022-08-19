@extends('layouts.app')

@section('title', 'Autores | Inicio')

@section('content')
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
                    <h3 class="card-title">Autores</h3>
                    <a class="btn btn-success" href="{{ route('author.create') }}"><i data-feather="plus-square"></i> Nuevo
                        Autor</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Nacionalidad</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($authors)
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $author->id }}</td>
                                            <td>{{ $author->sur_name }}</td>
                                            <td>{{ $author->last_name }}</td>
                                            <td>{{ date('d/M/Y', strtotime($author->date_of_birth)) }}</td>
                                            <td>{{ $author->citizenship }}</td>
                                            <td><img src="{{ asset('storage/images/authors/' . $author->image) }}"
                                                    alt="{{ $author->sur_name}}" width="75"
                                                    class="img-thumbnail img-responsive img-fluit roundedmx-auto d-block">
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('author.edit', $author->id) }}">
                                                    <i data-feather="edit"></i> Editar</a>
                                                <button class="btn btn-danger"
                                                    onclick="delete_value('{{ route('author.destroy', $author) }}')">
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
@endsection
