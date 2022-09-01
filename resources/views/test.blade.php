<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>Mi pagina de prueba</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <main id="app">

        <rick-and-morty>
        </rick-and-morty>


    </main>
    <script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
