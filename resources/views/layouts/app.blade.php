<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
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
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <!-- icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace({
            'width': 15,
            'height': 15
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"> </script>
    @yield('scripts')
    <script>
        function delete_value(url) {
            const delete_modal = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            delete_modal.fire({
                title: 'Esta seguro?',
                text: "Esta accion sera irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, borrar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.deleted) {
                                delete_modal.fire({
                                    title: 'Borrado!',
                                    text: data.message,
                                    icon: 'success'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            } else {
                                delete_modal.fire(
                                    'No completado',
                                    data.message,
                                    'warning'
                                )
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    delete_modal.fire(
                        'Cancelado',
                        'La accion ha sido anulada',
                        'error'
                    )
                }
            })
        }
        $(document).ready(function() {
            $('.table').DataTable();
        });
        @yield('scripts')
    </script>
</body>

</html>
