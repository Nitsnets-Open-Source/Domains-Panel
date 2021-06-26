<?php declare(strict_types=1);

namespace App\Domains\Domain\Mail;

use Illuminate\Support\Collection;
use App\Domains\Shared\Mail\MailFactoryAbstract;

class MailFactory extends MailFactoryAbstract
{
    /**
     * @param \Illuminate\Support\Collection $list
     *
     * @return void
     */
    public function domainExpiresSoon(Collection $list): void
    {
        $this->queue(new DomainExpiresSoon($list));
    }

    /**
     * @param \Illuminate\Support\Collection $list
     *
     * @return void
     */
    public function domainExpiresToday(Collection $list): void
    {
        $this->queue(new DomainExpiresToday($list));
    }
}
