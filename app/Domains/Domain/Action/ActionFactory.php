<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Domain\Model\Domain
     */
    protected ?Model $row;

    /**
     * @return void
     */
    public function checkAll(): void
    {
        $this->actionHandle(CheckAll::class);
    }

    /**
     * @return void
     */
    public function check(): void
    {
        $this->actionHandle(Check::class);
    }

    /**
     * @return void
     */
    public function checkCertificateAll(): void
    {
        $this->actionHandle(CheckCertificateAll::class);
    }

    /**
     * @return void
     */
    public function checkCertificate(): void
    {
        $this->actionHandle(CheckCertificate::class);
    }

    /**
     * @return void
     */
    public function checkDomainAll(): void
    {
        $this->actionHandle(CheckDomainAll::class);
    }

    /**
     * @return void
     */
    public function checkDomain(): void
    {
        $this->actionHandle(CheckDomain::class);
    }

    /**
     * @return void
     */
    public function checkPingAll(): void
    {
        $this->actionHandle(CheckPingAll::class);
    }

    /**
     * @return void
     */
    public function checkPing(): void
    {
        $this->actionHandle(CheckPing::class);
    }

    /**
     * @return void
     */
    public function checkSubdomainAll(): void
    {
        $this->actionHandle(CheckSubdomainAll::class);
    }

    /**
     * @return void
     */
    public function checkSubdomain(): void
    {
        $this->actionHandle(CheckSubdomain::class);
    }

    /**
     * @return void
     */
    public function checkUrlAll(): void
    {
        $this->actionHandle(CheckUrlAll::class);
    }

    /**
     * @return void
     */
    public function checkUrl(): void
    {
        $this->actionHandle(CheckUrl::class);
    }

    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function create(): Model
    {
        return $this->actionHandleTransaction(Create::class, $this->validate()->create());
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->actionHandle(Delete::class);
    }

    /**
     * @return void
     */
    public function notifyDomainExpiresSoon(): void
    {
        $this->actionHandle(NotifyDomainExpiresSoon::class);
    }

    /**
     * @return void
     */
    public function notifyDomainExpiresToday(): void
    {
        $this->actionHandle(NotifyDomainExpiresToday::class);
    }

    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function updateBoolean(): Model
    {
        return $this->actionHandle(UpdateBoolean::class, $this->validate()->updateBoolean());
    }
}
