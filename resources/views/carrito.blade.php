@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
             {{-- <book-tabla :books="books_news"></book-tabla> --}}
             <card-book  :books="{{$books_news}}"></card-book>
        </div>
    </div>
</div>
@endsection
