<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use Exception;
use App\Domains\Check\Model\Check as Model;
use App\Services\Network\Whois\Whois as WhoisService;

class Domain extends ActionAbstract
{
    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function handle(): Model
    {
        $this->check();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        try {
            $whois = WhoisService::get($this->row->value);
        } catch (Exception $e) {
            $this->status('FAILED');
            return;
        }

        if ($whois === null) {
            $this->status('FAILED');
            return;
        }

        $this->details('expires_at', $whois['expiresDate']);

        if ($this->row->details['expires_at'] === null) {
            $this->status('FAILED');
            return;
        }

        if (strtotime($this->row->details['expires_at']) < time()) {
            $this->status('FAILED');
            return;
        }

        $this->status('SUCCESS');
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
