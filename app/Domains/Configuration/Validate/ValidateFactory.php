<?php declare(strict_types=1);

namespace App\Domains\Configuration\Validate;

use App\Domains\Shared\Validate\ValidateFactoryAbstract;

class ValidateFactory extends ValidateFactoryAbstract
{
    /**
     * @return array
     */
    public function update(): array
    {
        return $this->handle(Update::class);
    }
}
