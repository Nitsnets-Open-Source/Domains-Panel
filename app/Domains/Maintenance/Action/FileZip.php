<?php declare(strict_types=1);

namespace App\Domains\Maintenance\Action;

use App\Services\Compress\Zip;

class FileZip extends ActionAbstract
{
    /**
     * @var \App\Services\Compress\Zip
     */
    protected Zip $service;

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->data();
        $this->service();
        $this->compress();
    }

    /**
     * @return void
     */
    protected function data(): void
    {
        $this->data['path'] = base_path($this->data['folder']);
        $this->data['date'] = date('Y-m-d H:i:s', strtotime('-'.$this->data['days'].' days'));
    }

    /**
     * @return void
     */
    protected function service(): void
    {
        $this->service = new Zip($this->data['path'], $this->data['extensions'], $this->data['date']);
    }

    /**
     * @return void
     */
    protected function compress(): void
    {
        $this->service->compress();
    }
}
