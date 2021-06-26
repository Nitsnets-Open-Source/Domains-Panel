<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class CheckCertificateAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check:certificate:all';

    /**
     * @var string
     */
    protected $description = 'Check All Domains Certificates';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkCertificateAll();
    }
}
