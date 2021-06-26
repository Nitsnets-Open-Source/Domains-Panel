<?php declare(strict_types=1);

namespace App\Domains\Configuration\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Update extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'value' => ['bail', 'required', 'string'],
            'description' => ['bail', 'required', 'string'],
        ];
    }
}
