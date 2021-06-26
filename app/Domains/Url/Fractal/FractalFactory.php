<?php declare(strict_types=1);

namespace App\Domains\Url\Fractal;

use App\Domains\Shared\Fractal\FractalAbstract;
use App\Domains\Url\Model\Url as Model;

class FractalFactory extends FractalAbstract
{
    /**
     * @param \App\Domains\Url\Model\Url $row
     *
     * @return array
     */
    protected function simple(Model $row): array
    {
        return $row->only('id', 'enabled');
    }
}
