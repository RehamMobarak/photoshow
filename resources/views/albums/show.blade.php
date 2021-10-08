@extends('layouts.app')
@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{$album->Name}}</h1>
            <p class="lead text-muted">{{$album->Description}}</p>
            <p>
                <a href={{route('photo-create' , $album->id)}} class="btn btn-primary my-2">Upload photos</a>
                <a href="/" class="btn btn-secondary my-2">Go Home</a>
            </p>
        </div>
    </div>
</section>

@if (count($album->photos) > 0)
<div class="container">
    <div class="row">
        @foreach ($album->photos as $photo)
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img src="/storage/albums/{{$album->id}}/{{$photo->PhotoName}}" alt="{{$photo->PhotoName}}"
                    height="250px">
                <div class="card-body">
                    <p class="card-text">{{$photo->Description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group ">
                            <a href="{{route('photo-show', $photo->id)}}"
                                class="btn btn-sm btn-outline-secondary ">View</a>

                            <form action="{{route('photo-delete', $photo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-sm btn-danger '>Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<h1> No photos yet </h1>
@endif
@endsection