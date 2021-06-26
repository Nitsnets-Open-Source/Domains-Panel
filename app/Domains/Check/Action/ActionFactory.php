<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use App\Domains\Check\Model\Check as Model;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Check\Model\Check
     */
    protected ?Model $row;

    /**
     * @return void
     */
    public function clearOld(): void
    {
        $this->actionHandle(ClearOld::class, $this->validate()->clearOld());
    }

    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function create(): Model
    {
        return $this->actionHandle(Create::class, $this->validate()->create());
    }

    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function certificate(): Model
    {
        return $this->actionHandle(Certificate::class);
    }

    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function domain(): Model
    {
        return $this->actionHandle(Domain::class);
    }

    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function ping(): Model
    {
        return $this->actionHandle(Ping::class);
    }

    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function url(): Model
    {
        return $this->actionHandle(Url::class);
    }
}
