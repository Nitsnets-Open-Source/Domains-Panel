<?php declare(strict_types=1);

namespace App\Domains\User\Action;

use Illuminate\Support\Facades\Hash;
use App\Domains\User\Model\User as Model;
use App\Exceptions\ValidatorException;

class Create extends ActionAbstract
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
        $this->data['email'] = strtolower($this->data['email']);
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
        if (Model::byEmail($this->data['email'])->count()) {
            throw new ValidatorException(__('user-create.error.exists'));
        }
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row = Model::create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
            'enabled' => 1,
        ]);
    }
}
