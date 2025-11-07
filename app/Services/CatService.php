<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;

class CatService implements \App\Contracts\PetApi
{

    private function exceededRateLimit(): bool
    {
        if (RateLimiter::tooManyAttempts('pet-api-call', 20)) {
            return true;
        }

        RateLimiter::increment('pet-api-call');

        return false;

    }
    public function searchForPets(string $query = ''): \Illuminate\Support\Collection
    {
        if (Cache::tags(['pets'])->has($query)) {
            return Cache::tags(['pets'])->get($query);
        }
        else {
            try {
                if ($this->exceededRateLimit()) {
                    return collect([]);
                }
                $pets = \Illuminate\Support\Facades\Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => config('app.cat_api_key'),
                ])->get('https://api.thecatapi.com/v1/breeds', [
                    'q' => $query
                ])->collect();

                Cache::tags(['pets'])->put($query, $pets, 3600);
                return $pets;
            } catch (\Exception $e) {
                return collect([]);
            }
        }
    }

    public function getPet(string $id): ?\Illuminate\Support\Collection
    {
        if (Cache::tags(['pets page'])->has($id)) {
            return Cache::tags(['pets page'])->get($id);
        }
        else {
            try {
                if ($this->exceededRateLimit()) {
                    return null;
                }
                $pets = \Illuminate\Support\Facades\Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => config('app.cat_api_key'),
                ])->get('https://api.thecatapi.com/v1/breeds/' . $id, [
                ])->collect();

                Cache::tags(['pets page'])->put($id, $pets, 3600);
                return $pets;
            } catch (\Exception $e) {
                return collect([]);
            }
        }
    }

    public function getImage(string $id): ?string
    {
        if (Cache::tags(['pets image'])->has($id)) {
            return Cache::tags(['pets image'])->get($id);
        }
        else {
            try {
                if ($this->exceededRateLimit()) {
                    return null;
                }
                $image = \Illuminate\Support\Facades\Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => config('app.cat_api_key'),
                ])->get('https://api.thecatapi.com/v1/images/' . $id, [
                ])->collect()['url'];

                Cache::tags(['pets image'])->put($id, $image, 3600);
                return $image;
            } catch (\Exception $e) {
                return null;
            }
        }
    }
}
