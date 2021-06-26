<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class CheckUrl extends CheckAbstract
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
        $urls = $this->urls();

        if (empty($this->row->url_enabled) || $urls->isEmpty()) {
            $this->row->url_status = null;
            return;
        }

        foreach ($urls as $each) {
            $this->factory('Url', $each)->action()->check();
        }

        $this->row->url_status = $urls->firstWhere('status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->url_checked_at = $urls->pluck('checked_at')->filter()->sort()->first();
    }
}
