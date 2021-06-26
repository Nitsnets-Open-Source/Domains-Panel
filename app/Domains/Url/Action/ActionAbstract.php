<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Model\Url as Model;
use App\Domains\Shared\Action\ActionAbstract as ActionAbstractShared;

abstract class ActionAbstract extends ActionAbstractShared
{
    /**
     * @var ?\App\Domains\Url\Model\Url
     */
    protected ?Model $row;
}
