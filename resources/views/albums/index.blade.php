@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($albums) > 0)
    <div class="row">
        @foreach ($albums as $album)
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img src="/storage/cover_images/{{$album->Cover_image}}" alt="cover-image" width="100%" height="100%">
                <div class="card-body">
                    <p class="card-text">{{$album->Description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                        </div>
                        <small class="text-muted">{{$album->Name}}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <h1> No albums yet </h1>
    @endif
</div>

@endsection