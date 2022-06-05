@extends('layouts/app')

@section('title', 'Home | Movie App')

@section('content')
    <div class="container movie-wrapper">
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-3 movie-item">
                    <div class="col-md-12 movie-content">
                        <h1>{{ $movie->title }}</h1>
                        <p>{{ $movie->description }}</p>
                        <span class="badge bg-warning">{{ $movie->genre->title }}</span>
                        <span>Tahun Terbit: {{ $movie->tahun_rilis }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
