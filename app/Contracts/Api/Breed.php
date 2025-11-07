<?php

declare(strict_types=1);

namespace App\Contracts\Api;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @property-read string $id
 * @property-read string $name
 * @property-read string | null $imageId
 * @property-read string | null $temperament
 * @property-read string | null $origin
 * @property-read string | null $description
 * @property-read string | null $wikipediaUrl
 */
interface Breed extends Arrayable
{

}
