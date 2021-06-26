<?php declare(strict_types=1);

namespace App\Domains\Url\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Create extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'url' => ['bail', 'required', 'string', 'url'],
            'enabled' => ['bail', 'boolean'],
            'domain_id' => ['bail', 'required', 'integer', 'exists:domain,id'],
            'subdomain_id' => ['bail', 'required', 'integer', 'exists:subdomain,id'],
        ];
    }
}
