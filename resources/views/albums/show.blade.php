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
@endsection