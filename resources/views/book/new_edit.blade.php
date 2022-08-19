@extends('layouts.app')

@section('title', "Libros | $title")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">{{ $title }} Nuevo libro</h3>
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
                    @if (isset($book))
                        <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                                <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Titulo</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                               placeholder="Ingrese el titulo" value="{{ isset($book) ? $book->title : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="isbn">Isbn</label>
                                        <input type="text" name="isbn" id="isbn" class="form-control"
                                               placeholder="Ingrese el ISBN" value="{{ isset($book) ? $book->isbn : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pages">Numero de paginas</label>
                                        <input type="number" name="pages" id="pages" class="form-control"
                                               placeholder="Ingrese la cantidad de paginas" value="{{ isset($book) ? $book->pages : '' }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="format">Formato</label>
                                        <input type="text" name="format" id="format" class="form-control"
                                               placeholder="formato del libro" value="{{ isset($book) ? $book->format : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sypnosis">Sipnosis</label>
                                        <textarea name="synopsis" id="synopsis" class="form-control" placeholder="agregue la description del libro"
                                                  required>{{ isset($book) ? $book->sypnosis : old('sypnosis') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="language">Idioma</label>
                                        <input type="text" name="language" id="language" class="form-control"
                                               placeholder="Ingrese el idioma del libro" value="{{ isset($book) ? $book->language : '' }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="publication_date">Fecha de publicacion</label>
                                        <input type="date" name="publication_date" id="publication_date" class="form-control"
                                               value="{{ isset($book) ? $book->publication_date : '' }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                               placeholder="agregue el precio del libro" value="{{ isset($book) ? $book->price : '' }}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher_id">Seleccione la editorial</label>
                                        <select class="form-control" name="publisher_id" id="publisher_id" required>
                                            <option value="" disabled selected>Seleccione una editorial...</option>
                                            @if (isset($publishers))
                                                @foreach ($publishers as $publisher)
                                                    <option value="{{ $publisher->id }}"
                                                            @if (isset($book) && $publisher->id == $book->publisher_id) selected @endif>

                                                        {{ $publisher->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="authors">Seleccione los autores del libro</label>
                                        <select class="form-control selecttwo" id="authors" name="authors[]" multiple="multiple">

                                            <option disabled>seleccione los autores</option>
                                            @if (isset($authors))
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}"
                                                            @if (isset($book)) @foreach ($book->authors as $book_author) @if ($author->id == $book_author->id)
                                                            selected @endif
                                                        @endforeach
                                                        @endif

                                                    >{{ $author->sur_name }} {{ $author->last_name }} </option>

                                                @endforeach

                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="authors">Seleccione los generos del libro</label>
                                        <select class="form-control selecttwo" id="genres" name="genres[]" multiple="multiple">

                                            <option disabled>seleccione los generos</option>
                                            @if (isset($genres))
                                                @foreach ($genres as $genre)
                                                    <option value="{{ $genre->id }}"
                                                            @if (isset($book)) @foreach ($book->genres as $book_genre) @if ($genre->id == $book_genre->id)
                                                            selected @endif
                                                        @endforeach
                                                        @endif>{{ $genre->name }} </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Agregue una imagen del libro</label>
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.selecttwo').select2();
        });
    </script>
@endsection
