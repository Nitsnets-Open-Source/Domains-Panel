<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class CheckPing extends CheckAbstract
{
    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
     */
    public function handle(): Model
    {
        $this->check();
        $this->status();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        if (empty($this->row->ping_enabled)) {
            $this->row->ping_status = null;
            return;
        }

        $check = $this->create('ping', $this->row->host);

        $this->factory('Check', $check)->action()->ping();

        $this->row->ping_status = $check->status;
        $this->row->ping_checked_at = $check->created_at;
    }
}
