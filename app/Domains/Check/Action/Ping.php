<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use Exception;
use App\Domains\Check\Model\Check as Model;
use App\Services\Network\Ping\Ping as PingService;

class Ping extends ActionAbstract
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
            $this->status(PingService::get($this->row->value) ? 'SUCCESS' : 'FAILED');
        } catch (Exception $e) {
            $this->status('FAILED');
        }
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
