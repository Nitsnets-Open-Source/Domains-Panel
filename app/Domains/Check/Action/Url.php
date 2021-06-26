<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use App\Domains\Check\Model\Check as Model;
use App\Services\Http\Curl\Curl;

class Url extends ActionAbstract
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
        $response = $this->request();

        $this->details('code', (int)$response['http_code']);
        $this->details('time', round($response['total_time'], 2));

        $this->status(($this->row->details['code'] === 200) ? 'SUCCESS' : 'FAILED');
    }

    /**
     * @return array
     */
    protected function request(): array
    {
        return (new Curl())
            ->setUrl($this->row->value)
            ->setTimeOut(10)
            ->setException(false)
            ->send()
            ->info();
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
