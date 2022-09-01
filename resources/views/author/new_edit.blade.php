<x-app-layout>
  <x-slot name="title">new author</x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">{{ $title }} autor</h3>
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
                    @if (isset($author))
                        <form action="{{ route('author.update', $author->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="sur_name">Nombres</label>
                        <input type="text" name="sur_name" id="sur_name" class="form-control"
                            placeholder="Ingrese los nombres del autor"
                            value="{{ isset($author) ? $author->sur_name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellidos</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            placeholder="Ingrese los apellidos del autor"
                            value="{{ isset($author) ? $author->last_name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="citizenship">Nacionalidad</label>
                        <input type="text" name="citizenship" id="citizenship" class="form-control"
                            placeholder="Ingrese la nacionalidad del autor"
                            value="{{ isset($author) ? $author->citizenship : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Fecha de nacimiento</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                            value="{{ isset($author) ? $author->date_of_birth : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bio">Biografia</label>
                        <textarea name="bio" id="bio" class="form-control" placeholder="agregue la biografia del autor" required>{{ isset($author) ? $author->bio : '' }}</textarea>
                    </div>


                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Agregue una imagen del autor</label>
                        </div>
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input class="btn btn-success" type="submit" value="Crear">
                    <a class="btn btn-link" href="{{ route('author.index') }}">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
