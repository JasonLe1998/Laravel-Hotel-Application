@extends('layoutsOne.app')

@section('content')
    <h1>Create Bookings</h1>

    {!! Form::open(['action' =>'App\Http\Controllers\BookingsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'container']) !!}
    
        @if(count($data) > 0)
        @foreach($data as $data)
            <div class = "form-group">
                {{Form::label('roomNumber', $data->roomNumber)}}
                {{Form::checkbox('roomNumber', $data->roomNumber)}}
            </div>
        @endforeach
        @else
            <p>No rooms available!</p>
        @endif

        <div class = "form-group">
            {{Form::label('guestName', 'guestName')}}
            {{Form::text('guestName', '', ['class' => 'form-control', 'placeholder' => 'guestName'])}}
        </div>

        <div class = "form-group">
            {{Form::label('date', 'date')}}
            {{Form::text('date', '', ['class' => 'form-control', 'placeholder' => 'date'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection