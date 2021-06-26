<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Mail;

use Illuminate\Support\Collection;
use App\Domains\Shared\Mail\MailAbstract;

class CertificateExpiresSoon extends MailAbstract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public Collection $list;

    /**
     * @var string
     */
    public $view = 'domains.subdomain.mail.certificate-expires-soon';

    /**
     * @param \Illuminate\Support\Collection $list
     * @param string $emails
     *
     * @return self
     */
    public function __construct(Collection $list, string $emails)
    {
        $this->to($emails);

        $this->subject = __('subdomain-certificate-expires-soon-mail.subject');
        $this->list = $list;
    }
}
