<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Fractal;

use App\Domains\Shared\Fractal\FractalAbstract;
use App\Domains\Subdomain\Model\Subdomain as Model;

class FractalFactory extends FractalAbstract
{
    /**
     * @param \App\Domains\Subdomain\Model\Subdomain $row
     *
     * @return array
     */
    protected function simple(Model $row): array
    {
        return $row->only('id', 'certificate_enabled', 'subdomain_enabled', 'ping_enabled', 'url_enabled', 'enabled');
    }
}
