<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Throwable;

class CatService
{
    private readonly Client $client;

    /**
     * Constructor to initialize the HTTP client.
     */
    public function __construct(?Client $client= null)
    {
        $this->client = new Client([
            'base_uri' => config('services.cat-api.url'),
            'headers' => [
                'x-api-key' => config('services.cat-api.key'),
            ],
        ]);
    }

    /**
     * Fetch all cat breeds from The Cat API.
     */
    public function allBreeds(): array
    {
        return Cache::remember('cat_breeds', 1800, function () {
            try {
                $response = $this->client->get('breeds');
                return json_decode((string) $response->getBody(), true) ?? [];

            } catch (RequestException $e) {
                return [];
            }
        });
    }


    /**
     * Find a specific breed by its ID from The Cat API.
     */
    public function findBreedById(string $breedId): ?array
    {
        return Cache::remember("breeds.{$breedId}", 1800, function () use ($breedId){
            try {
                $response = $this->client->get("images/search", [
                    'query' => ['breed_ids' => $breedId],
                ]);
                return collect($this->decodeResponse($response))->first();

            } catch (Throwable $error){
                return null;
            }
        });
    }

    /**
     * Decode the JSON response from The Cat API.
     */
    private function decodeResponse($response): array
    {
        return json_decode((string) $response->getBody(), true) ?? [];
    }
}
