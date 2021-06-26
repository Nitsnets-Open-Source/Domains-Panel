<?php declare(strict_types=1);

namespace App\Domains\Check\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class Create extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'type' => ['bail', 'required', 'string'],
            'value' => ['bail', 'required', 'string'],

            'domain_id' => ['bail', 'integer', 'required', 'exists:domain,id'],
            'subdomain_id' => ['bail', 'integer', 'nullable', 'exists:subdomain,id'],
            'url_id' => ['bail', 'integer', 'nullable', 'exists:url,id'],
        ];
    }
}
