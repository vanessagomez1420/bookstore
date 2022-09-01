<x-app-layout>
 <x-slot name="title">books</x-slot>
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
                    <h3 class="card-title">Libros</h3>
                    <a class="btn btn-success" href="{{ route('book.new') }}"><i data-feather="plus-square"></i> Nuevo
                        Libro</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>ISBN</th>
                                    <th># paginas</th>
                                    <th>Formato</th>
                                    <th>Idioma</th>
                                    <th>Fecha de publicacion</th>
                                    <th>Precio</th>
                                    <th>Editorial</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($books)
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td>{{ $book->pages }}</td>
                                            <td>{{ $book->format }}</td>
                                            <td>{{ $book->language }}</td>
                                            <td>{{ date('d/M/Y', strtotime($book->publication_date)) }}</td>
                                            <td>{{ number_format($book->price, 2) }}</td>
                                            <td>{{ $book->publisher->name }}</td>
                                            <td>

                                                <button class="btn btn-info" onclick="show_details({{ $book }})">
                                                    <i data-feather="book-open"></i> Detalles</button>
                                                <a class="btn btn-warning" href="{{ route('book.edit', $book->id) }}">
                                                    <i data-feather="edit"></i> Editar</a>
                                                <button class="btn btn-danger"
                                                    onclick="delete_value('{{ route('book.delete', $book) }}')">
                                                    <i data-feather="trash-2"></i> Borrar</button>
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
    <div class="modal fade" id="showBook" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="showBookLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered  ">
            <div class="modal-content ">
                <div class="modal-header">
                    <div class="col-md-12 text-center">
                        <h5 id="title"></h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6" id="image">

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                ISBN: <h6 id="isbn"></h6>

                            </div>
                            <div class="col-md-6">
                                Format:<h6 id="format"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Fecha de publicacion :<h6 id="publication_date"></h6>
                            </div>
                            <div class="col-md-6">
                                Idioma:<h6 id="language"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Número Paginas:<h6 id="pages"></h6>
                            </div>
                            <div class="col-md-6">
                                Editorial:<h6 id="publisher"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Autores:<h6 id="authors"></h6>
                            </div>
                            <div class="col-md-6">
                                Generos:<h6 id="genres"></h6>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    Sipnosis: <p id="sypnosis"></p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    Precio: <h5 id="price"></h5>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <x-app-layout>
        <script>
            function show_details(book) {
                console.log(book);
                let authors = '';
                let genres = '';
                if (book.authors.length < 1) {
                    authors = '<li>No hay autores</li>';
                } else {

                    for (let index = 0; index < book.authors.length; index++) {
                        authors += '<li>' + book.authors[index].sur_name + '' + book.authors[index].last_name + '</li>';
                    }
                }
                if (book.genres.length < 1) {
                    genres = '<li>No hay generos</li>';
                } else {

                    for (let index = 0; index < book.genres.length; index++) {
                        genres += '<li>' + book.genres[index].name + '</li>';
                    }
                }



                console.log(authors);
                $('#title').html(book.title);

                $('#isbn').html(book.isbn);
                $('#format').html(book.format);
                $('#publication_date').html(book.publication_date);
                $('#language').html(book.language);
                $('#pages').html(book.pages);
                $('#publisher').html(book.publisher.name + " (" + book.publisher.city + ")");
                $('#authors').html('<ul>' + authors + '</ul>');
                $('#genres').html('<ul>' + genres + '</ul>');
                $('#sypnosis').html(book.sypnosis);
                $('#price').html(book.price.toLocaleString('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    mininumFractionDigits: 2
                }));
                let img = document.createElement('img');
                img.src = "{{ asset('storage/images/books/') }}" + '/' + book.image;
                img.classList.add = ('img-thumbnail', 'img-responsive','img-fluid','rounded', 'mx-auto','d-block');
                img.id = 'img-element';
                document.getElementById('image').appendChild(img);
                $('#showBook').modal();
            }

            $('#showBook').on('hidden.bs.modal', function() {
                $('#img-element').remove();
            });
        </script>




</x-app-layout>
