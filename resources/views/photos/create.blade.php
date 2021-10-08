@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Upload new photo for album " {{$albumId}} "</h2>
    <form method="POST" action="{{route('photo-store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="albumId" value="{{$albumId}}">

            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name='title' placeholder="Enter photo title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name='description' placeholder="Enter description">
        </div>

        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" class="form-control" id="photo" name='photo'>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection