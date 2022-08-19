<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css" />
    <noscript><link rel="stylesheet" href="/css/noscript.css" /></noscript>
    <title>Libreria | Inicio</title>
</head>

<body class="is-preload">
<div id="bg"></div>
<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-gem"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Libreria</h1>
								<p>Proyecto laravel con blade</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="{{route ('author.index')}}">Autores</a></li>
								<li><a href="{{route ('publisher.index')}}">Editoriales</a></li>
								<li><a href="{{route ('genre.index')}}">Generos Lit</a></li>
								<li><a href="{{route ('book.index')}}">Libros</a></li>
								
							</ul>
						</nav>
					</header>
			
            <script src="/js/jquery.min.js"></script>
			<script src="/js/browser.min.js"></script>
			<script src="/js/breakpoints.min.js"></script>
			<script src="/js/util.js"></script>
			<script src="/js/main.js"></script>


</body>
</html>
