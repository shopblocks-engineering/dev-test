@extends('layouts.app')

@section('title', 'Cat Breeds')

@push('style')
    <style>
        .cat-card img {
            height: 200px;
            object-fit: cover;
        }
        .cat-card {
            transition: transform 0.2s ease;
        }
        .cat-card:hover {
            transform: translateY(-4px);
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-center">Cat Breeds</h2>

        <form method="GET" class="mb-4 d-flex justify-content-center">
            <div class="position-relative w-50">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control rounded-5 form-control-lg" placeholder="Search for a cat breed">
                <i class="ph ph-magnifying-glass position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%);"></i>
            </div>
        </form>

        @php
            $filtered = collect($breeds)->filter(function ($breed) {
                $query = request('search');
                return !$query || stripos($breed['name'], $query) !== false;
            });
        @endphp

        <div class="row justify-content-center">
            @forelse($filtered as $breed)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('cats.show', $breed['id']) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm cat-card">
                            @if(!empty($breed['image']['url']))
                                <img src="{{ $breed['image']['url'] }}" class="card-img-top" alt="{{ $breed['name'] }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $breed['name'] }}</h5>
                                <p class="card-text small text-muted">
                                    {{ Str::limit($breed['temperament'] ?? 'No info available', 60) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-muted">No breeds found.</p>
            @endforelse
        </div>
    </div>
@endsection
