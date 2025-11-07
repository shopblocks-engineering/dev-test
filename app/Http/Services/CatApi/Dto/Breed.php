<?php

declare(strict_types=1);

namespace App\Http\Services\CatApi\Dto;

use App\Contracts\Api\Breed as BreedContract;

class Breed implements BreedContract
{
    public const ID_KEY = 'id';

    public const NAME_KEY = 'name';

    public const IMAGE_ID_KEY = 'reference_image_id';

    public const TEMPERAMENT_KEY = 'temperament';

    public const ORIGIN_KEY = 'origin';

    public const DESCRIPTION_KEY = 'description';

    public const WIKIPEDIA_URL_KEY = 'wikipedia_url';

    /**
     * Breed constructor.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $imageId = null,
        public readonly ?string $temperament = null,
        public readonly ?string $origin = null,
        public readonly ?string $description = null,
        public readonly ?string $wikipediaUrl = null
    ) {
    }

    /**
     * New instance of breed from array
     *
     * @param array{id: string, name: string} $breed
     */
    public static function fromArray(array $breed): Breed
    {
        return new Breed(
            $breed[self::ID_KEY],
            $breed[self::NAME_KEY],
            $breed[self::IMAGE_ID_KEY] ?? null,
            $breed[self::TEMPERAMENT_KEY] ?? null,
            $breed[self::ORIGIN_KEY] ?? null,
            $breed[self::DESCRIPTION_KEY] ?? null,
            $breed[self::WIKIPEDIA_URL_KEY] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            self::ID_KEY => $this->id,
            self::NAME_KEY => $this->name,
            self::IMAGE_ID_KEY => $this->imageId,
            self::WEIGHT_KEY => $this->weight,
            self::HEIGHT_KEY => $this->height,
            self::LIFE_SPAN_KEY => $this->lifeSpan,
            self::BRED_FOR_KEY => $this->bredFor,
            self::BREED_GROUP_KEY => $this->breedGroup
        ];
    }
}
