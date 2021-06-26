<?php declare(strict_types=1);

namespace App\Domains\User\Action;

use Illuminate\Support\Facades\Hash;
use App\Domains\User\Model\User as Model;
use App\Exceptions\ValidatorException;

class UpdateSimple extends ActionAbstract
{
    /**
     * @return \App\Domains\User\Model\User
     */
    public function handle(): Model
    {
        $this->data();
        $this->check();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function data(): void
    {
        if ($this->data['email']) {
            $this->data['email'] = strtolower($this->data['email']);
        }

        if ($this->request->input('enabled') === null) {
            $this->data['enabled'] = null;
        }
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
        if ($this->data['email'] && Model::byIdNot($this->row->id)->byEmail($this->data['email'])->count()) {
            throw new ValidatorException(__('user-update.error.exists'));
        }
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        if ($this->data['name']) {
            $this->row->name = $this->data['name'];
        }

        if ($this->data['email']) {
            $this->row->email = $this->data['email'];
        }

        if ($this->data['password']) {
            $this->row->password = Hash::make($this->data['password']);
        }

        if ($this->data['enabled'] !== null) {
            $this->row->enabled = $this->data['enabled'];
        }

        $this->row->save();
    }
}
