<?php declare(strict_types=1);

namespace App\Domains\Check\Mail;

use Illuminate\Support\Collection;
use App\Domains\Check\Model\Check as Model;
use App\Domains\Shared\Mail\MailFactoryAbstract;

class MailFactory extends MailFactoryAbstract
{
    /**
     * @param \App\Domains\Check\Model\Check $row
     * @param \Illuminate\Support\Collection $list
     * @param int $limit
     *
     * @return void
     */
    public function failed(Model $row, Collection $list, int $limit): void
    {
        $this->queue(new Failed($row, $list, $limit));
    }
}
