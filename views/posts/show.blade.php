@extends('layoutsOne.app')

@section('content')
    <a href = "/" class = "btn btn-default">Go Back</a>
    <h1>{{$post->roomName}}</h1>
    <small>Description: {{$post->roomDesc}}</small>


@endsection

