<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Schedule;

use App\Domains\Subdomain\Command\NotifyCertificateExpiresSoon as NotifyCertificateExpiresSoonCommand;
use App\Domains\Subdomain\Command\NotifyCertificateExpiresToday as NotifyCertificateExpiresTodayCommand;
use App\Domains\Shared\Schedule\ScheduleAbstract;

class Manager extends ScheduleAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->command(NotifyCertificateExpiresSoonCommand::class, 'subdomain-notify-certificate-expires-soon')->daily();
        $this->command(NotifyCertificateExpiresTodayCommand::class, 'subdomain-notify-certificate-expires-today')->daily();
    }
}
