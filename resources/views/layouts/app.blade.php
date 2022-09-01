<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{'title'}}</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Libreria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('author.index') }}">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('publisher.index') }}">Editoriales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('genre.index') }}">Generos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('book.index') }}">Libros</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        {{ $slot }}
    </div>
</div>


<script src="{{ mix('js/app.js') }}"></script>
@yield('scripts')
</body>

</html>