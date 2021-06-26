<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;
use App\Domains\Shared\Action\ActionFactoryAbstract;

class ActionFactory extends ActionFactoryAbstract
{
    /**
     * @var ?\App\Domains\Subdomain\Model\Subdomain
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
     * @return \App\Domains\Subdomain\Model\Subdomain
     */
    public function create(): Model
    {
        return $this->actionHandle(Create::class, $this->validate()->create());
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->actionHandle(Delete::class);
    }

    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
     */
    public function update(): Model
    {
        return $this->actionHandle(Update::class, $this->validate()->update());
    }

    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
     */
    public function updateBoolean(): Model
    {
        return $this->actionHandle(UpdateBoolean::class, $this->validate()->updateBoolean());
    }

    /**
     * @return void
     */
    public function notifyCertificateExpiresSoon(): void
    {
        $this->actionHandle(NotifyCertificateExpiresSoon::class);
    }

    /**
     * @return void
     */
    public function notifyCertificateExpiresToday(): void
    {
        $this->actionHandle(NotifyCertificateExpiresToday::class);
    }
}
