@extends('layoutsOne.app')

@section('content')
    <h1>Create Rooms</h1>

    {!! Form::open(['action' =>'App\Http\Controllers\PostsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
        <div class = "form-group">
            {{Form::label('roomName', 'roomName')}}
            {{Form::text('roomName', '', ['class' => 'form-control', 'placeholder' => 'roomName'])}}
        </div>

        <div class = "form-group">
            {{Form::label('roomDesc', 'roomDesc')}}
            {{Form::text('roomDesc', '', ['class' => 'form-control', 'placeholder' => 'roomDesc'])}}
        </div>

        <div class = "form-group">
            {{Form::label('roomNumber', 'roomNumber')}}
            {{Form::number('roomNumber', '', ['class' => 'form-control', 'placeholder' => 'roomNumber'])}}
        </div>

        <div class = "form-group">
            {{Form::label('maxOccupancy', 'maxOccupancy')}}
            {{Form::number('maxOccupancy', '', ['class' => 'form-control', 'placeholder' => 'maxOccupancy'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection