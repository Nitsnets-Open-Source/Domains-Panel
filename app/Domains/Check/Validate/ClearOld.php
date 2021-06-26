<?php declare(strict_types=1);

namespace App\Domains\Check\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class ClearOld extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'days' => 'bail|integer|required',
        ];
    }
}
