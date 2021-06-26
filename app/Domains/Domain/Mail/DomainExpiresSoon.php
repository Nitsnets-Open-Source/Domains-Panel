<?php declare(strict_types=1);

namespace App\Domains\Domain\Mail;

use Illuminate\Support\Collection;
use App\Domains\Shared\Mail\MailAbstract;

class DomainExpiresSoon extends MailAbstract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public Collection $list;

    /**
     * @var string
     */
    public $view = 'domains.domain.mail.domain-expires-soon';

    /**
     * @param \Illuminate\Support\Collection $list
     *
     * @return self
     */
    public function __construct(Collection $list)
    {
        $this->to(app('configuration')->get('notify_email'));

        $this->subject = __('domain-domain-expires-soon-mail.subject');
        $this->list = $list;
    }
}
