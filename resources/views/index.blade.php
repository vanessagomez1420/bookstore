@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <author-index :authors="{{$authors}}"></author-index>
                <publisher-index :publishers="{{$publishers}}"></publisher-index>
                <book-index :books="{{$books}}"></book-index>
                <genre-index :genres="{{$genres}}"></genre-index>
            </div>
        </div>
    </div>
</div>
@endsection
