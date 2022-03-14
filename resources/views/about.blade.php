@extends('layouts.main')

@section('container')
<h3>{{$name }} </h3>
<p> {{ $desc }}</p>
<img src="https://source.unsplash.com/200x200?soccer" alt={{ $name }} width="200" class="img-thumbnail ">
@endsection