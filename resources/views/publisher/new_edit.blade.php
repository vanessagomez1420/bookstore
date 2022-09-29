</x-app-layout>
<x-slot name="title">new publisher</x-slot>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">{{ $title }} editorial</h3>
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
                    @if (isset($publisher))
                        <form action="{{ route('publisher.update', $publisher) }}" method="post">
                            @method('PUT')
                        @else
                            <form action="{{ route('publisher.store') }}" method="post">
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre de la editorial:</label>
                        <input name="name" id="name" type="text" class="form-control"
                            placeholder="Ingrese el nombre del editorial" required
                            value="{{ isset($publisher) ? $publisher->name : old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Direccion de la editorial:</label>
                        <input name="address" id="address" type="text" class="form-control"
                            placeholder="Ingrese la direccion del editorial" required
                            value="{{ isset($publisher) ? $publisher->address : old('address') }}">
                    </div>
                    <div class="form-group">
                        <label for="city">Cuidad de la editorial:</label>
                        <input name="city" id="city" type="text" class="form-control"
                            placeholder="Ingrese la cuidad del editorial" required
                            value="{{ isset($publisher) ? $publisher->city : old('city') }}">
                    </div>
                    <div class="form-group">
                        <label for="site">Sede de la editorial:</label>
                        <input name="site" id="site" type="text" class="form-control"
                            placeholder="Ingrese la sede del editorial" required
                            value="{{ isset($publisher) ? $publisher->site : old('site') }}">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Guardar">
                        <a class="btn btn-link" href="{{ route('publisher.index') }}">Volver</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
