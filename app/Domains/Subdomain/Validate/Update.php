<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Update extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'host' => ['bail', 'required', 'string'],

            'certificate_enabled' => ['bail', 'boolean'],
            'ping_enabled' => ['bail', 'boolean'],
            'url_enabled' => ['bail', 'boolean'],

            'enabled' => ['bail', 'boolean'],
        ];
    }
}
