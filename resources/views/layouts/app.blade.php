<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href={{mix('/css/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets\css/nav.css') }}>
    <title>Navbar</title>
</head>

<body>
  <nav class="nav__container">
    <div class="nav__content">

        <div class="nav__logo">
            <img src={{ asset('assets\css/img/libreria.png') }} alt="Logo">
            <span>Libreria</span>
        </div>

        <div class="nav__items">
            <ul class="nav__links">

                @auth
                    <li class="nav__item">
                        <a href="{{ route('author.index') }}">Autores</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('publisher.index') }}">Editoriales</a>
                    <li class="nav__item">
                        <a href="{{ route('genre.index') }}">Generos Lit</a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('book.index') }}">Libros</a>
                    </li>
                        {{-- <li class="nav__item">
                            <a href="{{ route('login1') }}">Inicio</a></li>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('register') }}">Registrarse</a></li>
                        </li> --}}

                @endauth

                <li class="nav_item">
                    <a href="{{ route('login.host') }}">Inicia Sessión</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav_item">
                        <a href="{{ route('register') }}">Registrate</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
       <div id="app">
        @yield('content')
       </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
