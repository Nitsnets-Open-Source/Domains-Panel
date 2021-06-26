<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckCertificateAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:certificate:all';

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
