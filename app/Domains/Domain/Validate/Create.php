<?php declare(strict_types=1);

namespace App\Domains\Domain\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Create extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'host' => ['bail', 'required', 'string'],

            'subdomain' => ['bail', 'boolean'],
            'enabled' => ['bail', 'boolean'],
        ];
    }
}
