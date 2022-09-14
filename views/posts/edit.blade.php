@extends('layoutsOne.app')

@section('content')
    <h1>Edit Room</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}

        <div class = "form-group">
            {{Form::label('roomDesc', 'roomDesc')}}
            {{Form::text('roomDesc', $post->roomDesc, ['class' => 'form-control', 'placeholder' => 'roomDesc'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection