<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Mail;

use Illuminate\Support\Collection;
use App\Domains\Shared\Mail\MailFactoryAbstract;

class MailFactory extends MailFactoryAbstract
{
    /**
     * @param \Illuminate\Support\Collection $list
     * @param string $emails
     *
     * @return void
     */
    public function certificateExpiresSoon(Collection $list, string $emails): void
    {
        $this->queue(new CertificateExpiresSoon($list, $emails));
    }

    /**
     * @param \Illuminate\Support\Collection $list
     * @param string $emails
     *
     * @return void
     */
    public function certificateExpiresToday(Collection $list, string $emails): void
    {
        $this->queue(new CertificateExpiresToday($list, $emails));
    }
}
