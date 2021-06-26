<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;
use App\Domains\Shared\Action\ActionAbstract as ActionAbstractShared;

abstract class ActionAbstract extends ActionAbstractShared
{
    /**
     * @var ?\App\Domains\Domain\Model\Domain
     */
    protected ?Model $row;
}
