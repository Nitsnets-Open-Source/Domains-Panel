<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use App\Domains\Domain\Model\Domain as Model;
use App\Domains\Subdomain\Model\Subdomain as SubdomainModel;
use App\Domains\Url\Model\Url as UrlModel;
use App\Domains\Shared\Controller\ControllerWebAbstract;
use App\Exceptions\NotFoundException;

abstract class ControllerAbstract extends ControllerWebAbstract
{
    /**
     * @var ?\App\Domains\Domain\Model\Domain
     */
    protected ?Model $row;

    /**
     * @var ?\App\Domains\Subdomain\Model\Subdomain
     */
    protected ?SubdomainModel $subdomain;

    /**
     * @var ?\App\Domains\Url\Model\Url
     */
    protected ?UrlModel $url;

    /**
     * @param int $id
     *
     * @return void
     */
    protected function row(int $id): void
    {
        $this->row = Model::byId($id)->firstOr(static function () {
            throw new NotFoundException(__('domain.error.not-found'));
        });
    }

    /**
     * @param int $id
     *
     * @return void
     */
    protected function subdomain(int $id): void
    {
        $this->subdomain = SubdomainModel::byId($id)->byDomainId($this->row->id)->firstOr(static function () {
            throw new NotFoundException(__('domain.error.domain-subdomain-not-found'));
        });
    }

    /**
     * @param int $id
     *
     * @return void
     */
    protected function url(int $id): void
    {
        $this->url = UrlModel::byId($id)->byDomainId($this->row->id)->firstOr(static function () {
            throw new NotFoundException(__('domain.error.domain-url-not-found'));
        });
    }
}
