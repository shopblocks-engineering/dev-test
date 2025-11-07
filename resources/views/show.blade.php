@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')

    <h1>{{ $pet['name'] }}</h1>
    <a href="{{route('dashboard')}}">Back</a>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @isset($image)
                    <img class="img-fluid" src="{{ $image }}" alt="Pet Image" />
                @endisset
            </div>

            <div class="col-md-8">
                @isset($pet['origin'])
                    <p>
                        <b>Origin:</b>
                        {{ $pet['origin'] }}
                    </p>
                @endisset
                @isset($pet['life_span'])
                    <p>
                        <b>Lifespan:</b>
                        {{ $pet['life_span'] }}
                    </p>
                @endisset
                @isset($pet['temperament'])
                    <p>
                        <b>Temperament:</b>
                        {{ $pet['temperament'] }}
                    </p>
                @endisset
                @isset($pet['wikipedia_url'])
                    <p><a href="{{ $pet['wikipedia_url'] }}">Read More</a></p>
                @endisset
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
