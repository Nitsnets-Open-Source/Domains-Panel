<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Controller;

use App\Domains\Subdomain\Model\Subdomain as Model;
use App\Domains\Url\Model\Url as UrlModel;
use App\Domains\Shared\Controller\ControllerWebAbstract;
use App\Exceptions\NotFoundException;

abstract class ControllerAbstract extends ControllerWebAbstract
{
    /**
     * @var ?\App\Domains\Subdomain\Model\Subdomain
     */
    protected ?Model $row;

    /**
     * @var ?\App\Domains\Url\Model\Url
     */
    protected ?UrlModel $suburl;

    /**
     * @param int $id
     *
     * @return void
     */
    protected function row(int $id): void
    {
        $this->row = Model::byId($id)->firstOr(static function () {
            throw new NotFoundException(__('subdomain.error.not-found'));
        });
    }

    /**
     * @param int $id
     *
     * @return void
     */
    protected function suburl(int $id): void
    {
        $this->suburl = UrlModel::byId($id)->bySubdomainId($this->row->id)->firstOr(static function () {
            throw new NotFoundException(__('subdomain.error.subdomain-url-not-found'));
        });
    }
}
