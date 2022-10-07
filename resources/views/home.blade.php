@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <card-book :books="{{$books_news}}"></card-book>
        <book-tabla></book-tabla>
    </div>
</div>
@endsection
