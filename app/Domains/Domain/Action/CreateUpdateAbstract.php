<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;
use App\Exceptions\ValidatorException;
use App\Services\Command\Artisan;

abstract class CreateUpdateAbstract extends ActionAbstract
{
    /**
     * @return void
     */
    abstract protected function save(): void;

    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function handle(): Model
    {
        $this->data();
        $this->check();
        $this->save();
        $this->event();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function data(): void
    {
        $this->data['host'] = trim(str_replace(['https://', 'http://'], '', strtolower($this->data['host'])), '/');
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        $this->checkExists();
        $this->checkHostname();
    }

    /**
     * @return void
     */
    protected function checkExists(): void
    {
        $q = Model::byHost($this->data['host']);

        if (isset($this->row)) {
            $q->byIdNot($this->row->id);
        }

        if ($q->count()) {
            throw new ValidatorException(__('domain-create.error.exists', ['host' => $this->data['host']]));
        }
    }

    /**
     * @return void
     */
    protected function checkHostname(): void
    {
        if (gethostbyname($this->data['host']) === $this->data['host']) {
            throw new ValidatorException(__('domain-create.error.host-invalid', ['host' => $this->data['host']]));
        }
    }

    /**
     * @return void
     */
    protected function event(): void
    {
        Artisan::exec(sprintf('domain:check --id=%s', $this->row->id));
    }
}
