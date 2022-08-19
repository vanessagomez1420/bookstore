@extends('layouts.app')

@section('title', 'Editoriales | Inicio')

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
                    <h4 class="card-title">Editoriales</h4>
                    <a class="btn btn-primary" href="{{ route('publisher.new') }}"><i data-feather="plus-square"></i>
                        Crear</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    <th>Sede</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($publishers)
                                    @foreach ($publishers as $publisher)
                                        <tr>
                                            <td>{{ $publisher->name }}</td>
                                            <td>{{ $publisher->address }}</td>
                                            <td>{{ $publisher->city }}</td>
                                            <td>{{ $publisher->site }}</td>
                                            <td><img src="{{ asset('storage/images/publisher/' . $publisher->image) }}"
                                                    class="img-thumbnail img-responsive img-fluid  rounded mx-auto d-block"
                                                    width="75" alt="{{ $publisher->name }}"></td>

                                            <td>
                                                <a class="btn btn-info" href="{{ route('publisher.edit', $publisher) }}">
                                                    <i data-feather="edit"></i> Editar</a>
                                                <a class="btn btn-danger"
                                                    onclick="delete_value('{{ route('publisher.delete', $publisher) }}')">
                                                    <i data-feather="trash-2"></i> Borrar</a>
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
