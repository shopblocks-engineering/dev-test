<?php

declare(strict_types=1);

namespace App\Contracts\Api;

use Illuminate\Contracts\Support\Arrayable;

/**
 * @property-read string $id
 * @property-read string $url
 */
interface Image extends Arrayable
{

}
