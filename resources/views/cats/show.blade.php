@extends('layouts.app')

@section('title', $breed['breeds'][0]['name'] ?? 'Cat Details')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('cats.index') }}" class="btn btn-outline-secondary mb-3">← Back to all breeds</a>

        @if(isset($breed['breeds'][0]))
            @php $info = $breed['breeds'][0]; @endphp

            <div class="card shadow-sm">
                <div class="row g-0">
                    <div class="col-md-5">
                        @if(!empty($breed['url']))
                            <img src="{{ $breed['url'] }}" alt="{{ $info['name'] }}" class="img-fluid rounded-start">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h2 class="card-title">{{ $info['name'] }}</h2>
                            <p class="card-text">{{ $info['description'] ?? 'No description available.' }}</p>

                            <ul class="list-unstyled mt-3">
                                <li><strong>Origin:</strong> {{ $info['origin'] ?? 'Unknown' }}</li>
                                <li><strong>Temperament:</strong> {{ $info['temperament'] ?? 'Unknown' }}</li>
                                <li><strong>Life Span:</strong> {{ $info['life_span'] ?? 'N/A' }} years</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="text-muted text-center mt-5">Breed information unavailable.</p>
        @endif
    </div>
@endsection
