<?php declare(strict_types=1);

namespace App\Domains\User\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class UpdateSimple extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'nullable', 'string'],
            'email' => ['bail', 'nullable', 'string', 'email:filter'],
            'password' => ['bail', 'nullable', 'min:8'],
            'enabled' => ['bail', 'nullable', 'boolean'],
        ];
    }
}
