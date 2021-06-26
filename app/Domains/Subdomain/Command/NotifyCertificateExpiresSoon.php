<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class NotifyCertificateExpiresSoon extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:notify:certificate:expires:soon';

    /**
     * @var string
     */
    protected $description = 'Notify expires soon certificates';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->notifyCertificateExpiresSoon();
    }
}
