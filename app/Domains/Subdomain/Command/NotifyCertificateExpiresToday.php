<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class NotifyCertificateExpiresToday extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:notify:certificate:expires:today';

    /**
     * @var string
     */
    protected $description = 'Notify expires today certificates';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->notifyCertificateExpiresToday();
    }
}
