<?php declare(strict_types=1);

namespace App\Domains\Domain\Validate;

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
            'domain_expires_at' => ['bail', 'date_format:d/m/Y'],

            'domain_enabled' => ['bail', 'boolean'],
            'subdomain_enabled' => ['bail', 'boolean'],
            'enabled' => ['bail', 'boolean'],
        ];
    }
}
