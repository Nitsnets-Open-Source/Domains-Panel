<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use Illuminate\Support\Collection;
use App\Domains\Subdomain\Model\Subdomain as Model;

class NotifyCertificateExpiresToday extends ActionAbstract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $list;

    /**
     * @var string
     */
    protected string $expiresDate;

    /**
     * @var string
     */
    protected string $emails;

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->config();
        $this->list();
        $this->mail();
    }

    /**
     * @return void
     */
    protected function config(): void
    {
        $this->expiresDate = date('Y-m-d');
        $this->emails = app('configuration')->get('notify_email');
    }

    /**
     * @return void
     */
    protected function list(): void
    {
        $this->list = Model::byCertificateExpiresDate($this->expiresDate)->get();
    }

    /**
     * @return void
     */
    protected function mail(): void
    {
        if ($this->list->isNotEmpty()) {
            $this->factory()->mail()->certificateExpiresToday($this->list, $this->emails);
        }
    }
}
