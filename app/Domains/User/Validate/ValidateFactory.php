<?php declare(strict_types=1);

namespace App\Domains\User\Validate;

use App\Domains\Shared\Validate\ValidateFactoryAbstract;

class ValidateFactory extends ValidateFactoryAbstract
{
    /**
     * @return array
     */
    public function authCredentials(): array
    {
        return $this->handle(AuthCredentials::class);
    }

    /**
     * @return array
     */
    public function create(): array
    {
        return $this->handle(Create::class);
    }

    /**
     * @return array
     */
    public function update(): array
    {
        return $this->handle(Update::class);
    }

    /**
     * @return array
     */
    public function updateSimple(): array
    {
        return $this->handle(UpdateSimple::class);
    }
}
