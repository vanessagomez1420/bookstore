@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <card-book-index :books="{{$books_news}}"></card-book-index>
    </div>
</div>
@endsection
