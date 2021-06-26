<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;
use App\Services\Command\Artisan;

class CheckPingAll extends ActionAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->iterate();
    }

    /**
     * @return void
     */
    protected function iterate(): void
    {
        foreach (Model::enabled()->get() as $each) {
            Artisan::exec(sprintf('subdomain:check:ping --id=%s', $each->id));
        }
    }
}
