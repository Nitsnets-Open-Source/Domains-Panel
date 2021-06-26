<?php declare(strict_types=1);

namespace App\Domains\Check\Command;

class ClearOld extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'check:clear:old {--days=30}';

    /**
     * @var string
     */
    protected $description = 'Delete old Checks previous to {--days=30} days';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action(['days' => $this->checkOption('days')])->clearOld();
    }
}
