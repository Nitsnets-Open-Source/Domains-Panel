<?php declare(strict_types=1);

namespace App\Domains\User\Action;

use App\Domains\User\Model\User as Model;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\User\Model\User
     */
    protected ?Model $row;

    /**
     * @return \App\Domains\User\Model\User
     */
    public function authCredentials(): Model
    {
        return $this->actionHandle(AuthCredentials::class, $this->validate()->authCredentials());
    }

    /**
     * @return \App\Domains\User\Model\User
     */
    public function authModel(): Model
    {
        return $this->actionHandle(AuthModel::class);
    }

    /**
     * @return \App\Domains\User\Model\User
     */
    public function create(): Model
    {
        return $this->actionHandleTransaction(Create::class, $this->validate()->create());
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $this->actionHandle(Logout::class);
    }

    /**
     * @return \App\Domains\User\Model\User
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\User\Model\User
     */
    public function updateSimple(): Model
    {
        return $this->actionHandle(UpdateSimple::class, $this->validate()->updateSimple());
    }
}
