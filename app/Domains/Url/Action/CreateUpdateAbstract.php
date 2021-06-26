<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Model\Url as Model;
use App\Exceptions\ValidatorException;

abstract class CreateUpdateAbstract extends ActionAbstract
{
    /**
     * @return void
     */
    abstract protected function save(): void;

    /**
     * @return \App\Domains\Url\Model\Url
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
        $this->checkExists();
    }

    /**
     * @return void
     */
    protected function checkExists(): void
    {
        $q = Model::byUrl($this->data['url']);

        if (isset($this->row)) {
            $q->byIdNot($this->row->id);
        }

        if ($q->count()) {
            throw new ValidatorException(__('domain-url-create.error.exists', ['url' => $this->data['url']]));
        }
    }
}
