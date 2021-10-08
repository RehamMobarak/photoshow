@extends('layouts.app')
@section('content')
<div class="container">
    <h3>{{$photo->Title}}</h3>
    <p>{{$photo->Description}}</p>
    <small>Size: {{$photo->Size}}</small>
    <form action="{{route('photo-delete', $photo->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class='btn btn-info btn-danger '>Delete</button>
        <a href="{{route('album-show', $photo->album_id)}}" class="btn btn-info">Back to album</a>
    </form>

    <hr>
    <img src="/storage/albums/{{$photo->album_id}}/{{$photo->PhotoName}}" alt="{{$photo->PhotoName}}">
</div>
@endsection