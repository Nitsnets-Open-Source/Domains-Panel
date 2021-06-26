<?php declare(strict_types=1);

namespace App\Domains\Check\Schedule;

use App\Domains\Check\Command\ClearOld as ClearOldCommand;
use App\Domains\Shared\Schedule\ScheduleAbstract;

class Manager extends ScheduleAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->command(ClearOldCommand::class, 'check-clear-old')->dailyAt('00:15');
    }
}
