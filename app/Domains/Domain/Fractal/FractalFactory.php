<?php declare(strict_types=1);

namespace App\Domains\Domain\Fractal;

use App\Domains\Shared\Fractal\FractalAbstract;
use App\Domains\Domain\Model\Domain as Model;

class FractalFactory extends FractalAbstract
{
    /**
     * @param \App\Domains\Domain\Model\Domain $row
     *
     * @return array
     */
    protected function simple(Model $row): array
    {
        return $row->only('id', 'domain_enabled', 'subdomain_enabled', 'enabled');
    }
}
