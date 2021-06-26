<?php declare(strict_types=1);

namespace App\Domains\Domain\Mail;

use Illuminate\Support\Collection;
use App\Domains\Shared\Mail\MailAbstract;

class DomainExpiresToday extends MailAbstract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public Collection $list;

    /**
     * @var string
     */
    public $view = 'domains.domain.mail.domain-expires-today';

    /**
     * @param \Illuminate\Support\Collection $list
     *
     * @return self
     */
    public function __construct(Collection $list)
    {
        $this->to(app('configuration')->get('notify_email'));

        $this->subject = __('domain-domain-expires-today-mail.subject');
        $this->list = $list;
    }
}
