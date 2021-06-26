<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use App\Domains\Check\Model\Check as Model;
use App\Services\Network\Certificate\Details as CertificateDetailsService;

class Certificate extends ActionAbstract
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
        $certificate = CertificateDetailsService::get($this->row->value);

        if ($certificate === null) {
            $this->status('FAILED');
            return;
        }

        if ($this->checkDomain($certificate) === false) {
            $this->status('FAILED');
            return;
        }

        $this->details('expires_at', date('Y-m-d H:i:s', (int)$certificate['validTo_time_t']));

        if ((int)$certificate['validTo_time_t'] < time()) {
            $this->status('FAILED');
            return;
        }

        $this->status('SUCCESS');
    }

    /**
     * @param array $certificate
     *
     * @return bool
     */
    protected function checkDomain(array $certificate): bool
    {
        if (empty($certificate['extensions']['subjectAltName'])) {
            return false;
        }

        $alt = $certificate['extensions']['subjectAltName'];
        $alt = str_replace('*', explode('.', $this->row->value)[0], $alt);

        return str_contains($alt, $this->row->value);
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
