<x-app-layout>
  <x-slot name="title">new genres</x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">{{ $title }} genero</h3>
                    @if ($errors->any())
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (isset($genre))
                        <form action="{{ route('genre.update', $genre->id) }}" method="post">
                            @method('PUT')
                        @else
                            <form action="{{ route('genre.store') }}" method="post">
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre del genero:</label>
                        <input name="name" id="name" type="text" class="form-control"
                            placeholder="Ingrese el nombre del genero" required
                            value="{{ isset($genre) ? $genre->name : old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion:</label>
                     <textarea name="description" id="description" class="form-control" placeholder="Agrege la descripcion del genero literario" required>{{ isset($genre)? $genre->description : '' }}</textarea>
                    </div>
               
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Crear">
                        <a class="btn btn-link" href="{{ route('genre.index') }}">Volver</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
