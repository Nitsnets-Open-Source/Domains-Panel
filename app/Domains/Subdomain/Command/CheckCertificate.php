<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class CheckCertificate extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check:certificate {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Subdomain Certificate by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkCertificate();
    }
}
