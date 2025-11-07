@extends('layouts.app')

@section('title', 'Breed')

@section('content')
    <a href="{{ route('dashboard') }}">« Back</a>

    <h3 class="typewriter mb-4">
        <span id="typewriterText">{{ $breed->name }}</span>
    </h3>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                @isset($image)
                    <img src="{{ $image->url }}" class="img-fluid rounded-start" alt="{{ $breed->name }}">
                @endisset
            </div>
        </div>
    </div>
@endsection
