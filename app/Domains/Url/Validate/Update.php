<?php declare(strict_types=1);

namespace App\Domains\Url\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Update extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'url' => ['bail', 'required', 'string', 'url'],
            'enabled' => ['bail', 'boolean'],
        ];
    }
}
