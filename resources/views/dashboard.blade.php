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

    <div id="search">
        <search results="{{ $pets }}"></search>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').focus();

            const titles = [
                "Looking for a Dog Breed?",
                "Searching for a Cat Breed?",
                "What Dog Breed Fits You?",
                "Find Your Perfect Feline Companion",
                "Explore Cat Breeds by Trait",
                "Discover Rare Dog Breeds",
                "Which Breed is Right for Your Family?",
                "Find Cat Breeds with Unique Traits",
                "Discover Dogs by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });
    </script>
@endpush
