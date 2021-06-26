<?php declare(strict_types=1);

namespace App\Domains\Dashboard\Controller;

use App\Domains\Domain\Model\Domain as DomainModel;
use App\Domains\Subdomain\Model\Subdomain as SubdomainModel;
use Illuminate\Http\Response;

class Index extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): Response
    {
        $this->meta('title', __('dashboard-index.meta-title'));

        return $this->page('dashboard.index', [
            'domains_domain_expired' => DomainModel::enabled()->whereDomainExpired()->get(),
            'domains_domain_expires_next' => DomainModel::enabled()->whereDomainExpiresNext()->limit(10)->get(),
            'domains_error' => DomainModel::enabled()->list()->filter(['error' => true])->get(),
            'subdomains_certificate_expired' => SubdomainModel::enabled()->whereCertificateExpired()->list()->get(),
            'subdomains_certificate_expires_next' => SubdomainModel::enabled()->whereCertificateExpiresNext()->list()->limit(10)->get(),
            'subdomains_error' => SubdomainModel::enabled()->list()->filter(['error' => true])->get(),
        ]);
    }
}
