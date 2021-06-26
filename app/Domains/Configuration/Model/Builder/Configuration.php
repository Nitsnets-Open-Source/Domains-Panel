<?php declare(strict_types=1);

namespace App\Domains\Configuration\Model\Builder;

use App\Domains\Shared\Model\Builder\BuilderAbstract;

class Configuration extends BuilderAbstract
{
    /**
     * @return self
     */
    public function list(): self
    {
        return $this->orderBy('key', 'ASC');
    }
}
