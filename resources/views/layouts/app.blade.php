<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href={{mix('/css/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets\css/nav.css') }}>
    <title>Libreria</title>
</head>

<body>
  <nav class="nav__container">
    <div class="nav__content" section="contenido">

        <div class="nav__logo">
            <img src={{ asset('assets\css/img/libreria.png') }} alt="Logo">
            <span>Libreria</span>
        </div>

        <div class="nav__items mb-2">
            <ul class="nav__links">

                @auth
                    {{-- @can('admin.home') --}}
                        <li class="nav__item">
                            <a href="{{ route('author.index') }}">Autores</a>
                        </li>
                        <li class="nav__item mb-2">
                            <a href="{{ route('publisher.index') }}">Editoriales</a>
                        <li class="nav__item mb-2">
                            <a href="{{ route('genre.index') }}">G.Literario</a>
                        </li>
                        <li class="nav__item mb-2">
                            <a href="{{ route('book.index') }}">Libros</a>
                        </li>
                        <li class="nav__item mb-2">
                            <a href="{{ route('carrito') }}">carrito</a>
                        </li>
                        {{-- @endcan --}}

                        <li class="nav__item mb-2">
                            <a href="{{ route('logout') }}">cerrar session</a>
                        </li>

                @endauth


                @guest
                    <li class="nav_item">
                    <a href="{{ route('login.view') }}">Inicia Sessión</a>
                    </li>

                    <li class="nav_item">
                        <a href="{{ route('register.view') }}">Registrate</a>
                    </li>
                @endguest
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
