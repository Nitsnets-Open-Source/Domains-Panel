<?php declare(strict_types=1);

namespace App\Domains\Url\Controller;

use App\Domains\Url\Model\Url as Model;
use App\Domains\Shared\Controller\ControllerWebAbstract;
use App\Exceptions\NotFoundException;

abstract class ControllerAbstract extends ControllerWebAbstract
{
    /**
     * @var ?\App\Domains\Url\Model\Url
     */
    protected ?Model $row;

    /**
     * @param int $id
     *
     * @return void
     */
    protected function row(int $id): void
    {
        $this->row = Model::byId($id)->firstOr(static function () {
            throw new NotFoundException(__('url.error.not-found'));
        });
    }
}
