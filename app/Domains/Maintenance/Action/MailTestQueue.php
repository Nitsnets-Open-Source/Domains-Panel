<?php declare(strict_types=1);

namespace App\Domains\Maintenance\Action;

use Generator;
use App\Services\Filesystem\Directory;

class MailTestQueue extends ActionAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->send();
    }

    /**
     * @return void
     */
    protected function send(): void
    {
        $this->factory()->mail()->testQueue($this->data['email']);
    }
}
