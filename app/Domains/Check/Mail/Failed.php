<?php declare(strict_types=1);

namespace App\Domains\Check\Mail;

use Illuminate\Support\Collection;
use App\Domains\Check\Model\Check as Model;
use App\Domains\Shared\Mail\MailAbstract;

class Failed extends MailAbstract
{
    /**
     * @var \App\Domains\Check\Model\Check $row
     */
    public Model $row;

    /**
     * @var \Illuminate\Support\Collection
     */
    public Collection $list;

    /**
     * @var int
     */
    public int $count;

    /**
     * @var int
     */
    public int $limit;

    /**
     * @var string
     */
    public $view = 'domains.check.mail.failed';

    /**
     * @param \App\Domains\Check\Model\Check $row
     * @param \Illuminate\Support\Collection $list
     * @param int $limit
     *
     * @return self
     */
    public function __construct(Model $row, Collection $list, int $limit)
    {
        $this->to(app('configuration')->get('notify_email'));

        $this->subject = __('check-failed-mail.subject', $row->only(['type', 'value']));
        $this->row = $row;
        $this->list = $list;
        $this->count = $list->count();
        $this->limit = $limit;
    }
}
