<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Model\Url as Model;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Url\Model\Url
     */
    protected ?Model $row;

    /**
     * @return \App\Domains\Url\Model\Url
     */
    public function check(): Model
    {
        return $this->actionHandle(Check::class);
    }

    /**
     * @return \App\Domains\Url\Model\Url
     */
    public function create(): Model
    {
        return $this->actionHandle(Create::class, $this->validate()->create());
    }

    /**
     * @return \App\Domains\Url\Model\Url
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\Url\Model\Url
     */
    public function updateBoolean(): Model
    {
        return $this->actionHandle(UpdateBoolean::class, $this->validate()->updateBoolean());
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->actionHandle(Delete::class);
    }
}
