<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckCertificate extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:certificate {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Domain Certificate by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkCertificate();
    }
}
