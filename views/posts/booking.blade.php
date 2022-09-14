@extends('layoutsOne.app')

@section('content')
    <h1>Bookings</h1>
    <a class="nav navbar-nav navbar-right" href="{{url('/bookings/create')}}">Create new room</a>

    <table class="table">
          <tr>
            <th scope="col">Room Number</th>
            <th scope="col">Room Name</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Date</th>
            <th scope = "col">Delete</th>
          </tr>
    @if(count($data) > 0)
        @foreach($data as $data)
              <tr>
                <td>{{$data->roomNumber}}</td>
                <td>{{$data->roomName}}</td>
                <td>{{$data->guestName}}</td>
                <td>{{$data->date}}</td>
                <td>
                {!! Form::open(['action' => ['App\Http\Controllers\BookingsController@destroy', $data->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete')}}
                {!!Form::close()!!}
                </td>
              </tr>
        @endforeach
    </table>
    @else
        <p>No bookings found</p>
    @endif
@endsection