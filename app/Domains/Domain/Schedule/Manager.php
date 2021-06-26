<?php declare(strict_types=1);

namespace App\Domains\Domain\Schedule;

use App\Domains\Domain\Command\CheckCertificateAll as CheckCertificateAllCommand;
use App\Domains\Domain\Command\CheckDomainAll as CheckDomainAllCommand;
use App\Domains\Domain\Command\CheckPingAll as CheckPingAllCommand;
use App\Domains\Domain\Command\CheckUrlAll as CheckUrlAllCommand;
use App\Domains\Domain\Command\NotifyDomainExpiresSoon as NotifyDomainExpiresSoonCommand;
use App\Domains\Domain\Command\NotifyDomainExpiresToday as NotifyDomainExpiresTodayCommand;
use App\Domains\Shared\Schedule\ScheduleAbstract;

class Manager extends ScheduleAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->command(CheckCertificateAllCommand::class, 'domain-check-certificate-all')->daily();
        $this->command(CheckDomainAllCommand::class, 'domain-check-domain-all')->weekly();
        $this->command(CheckPingAllCommand::class, 'domain-check-ping-all')->everyMinute();
        $this->command(CheckUrlAllCommand::class, 'domain-check-url-all')->everyFiveMinutes();
        $this->command(NotifyDomainExpiresSoonCommand::class, 'domain-notify-domain-expires-soon')->daily();
        $this->command(NotifyDomainExpiresTodayCommand::class, 'domain-notify-domain-expires-today')->daily();
    }
}
