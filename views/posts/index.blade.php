@extends('layoutsOne.app')

@section('content')
    <h1>Rooms</h1>
    <a class="nav navbar-nav navbar-right" href="{{url('/posts/create')}}">Create new room</a>

    <table class="table">
          <tr>
            <th scope="col">Room Number</th>
            <th scope="col">Room Name</th>
            <th scope="col">Room Desc</th>
            <th scope="col">Max Occupancy </th>
            <th scope = "col">Edit</th>
            <th scope = "col">Delete</th>
          </tr>
    @if(count($posts) > 0)
        @foreach($posts as $post)
              <tr>
                <td>{{$post->roomNumber}}</td>
                <td>{{$post->roomName}}</td>
                <td>{{$post->roomDesc}}</td>
                <td>{{$post->maxOccupancy}}</td>
                <td><a href = "/posts/{{$post->id}}/edit" class = "btn btn-default">Edit</a></td>
                <td>
                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete')}}
                {!!Form::close()!!}
                </td>
              </tr>
        @endforeach
    </table>
    @else
        <p>No posts found</p>
    @endif
@endsection