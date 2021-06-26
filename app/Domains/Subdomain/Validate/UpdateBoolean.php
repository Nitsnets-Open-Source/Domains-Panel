<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Validate;

use App\Domains\Shared\Validate\ValidateAbstract;

class UpdateBoolean extends ValidateAbstract
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'column' => 'bail|required|string|in:certificate_enabled,subdomain_enabled,ping_enabled,url_enabled,enabled',
        ];
    }
}
