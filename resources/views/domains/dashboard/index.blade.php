@extends ('layouts.in')

@section ('body')

<div class="2xl:masonry">
    @if ($domains_error->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto text-red-600">{{ __('dashboard-index.domains-error') }}</h2>
            </div>

            @include ('domains.domain.molecules.list-status', ['list' => $domains_error])
        </div>
    </div>

    @endif

    @if ($domains_domain_expired->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto text-red-600">{{ __('dashboard-index.domains-expired') }}</h2>
            </div>

            @include ('domains.domain.molecules.list-domain', ['list' => $domains_domain_expired])
        </div>
    </div>

    @endif

    @if ($domains_domain_expires_next->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">{{ __('dashboard-index.domains-expires-next') }}</h2>
            </div>

            @include ('domains.domain.molecules.list-domain', ['list' => $domains_domain_expires_next])
        </div>
    </div>

    @endif

    @if ($subdomains_error->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto text-red-600">{{ __('dashboard-index.subdomains_certificate-error') }}</h2>
            </div>

            @include ('domains.subdomain.molecules.list-status', ['list' => $subdomains_error])
        </div>
    </div>

    @endif

    @if ($subdomains_certificate_expired->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto text-red-600">{{ __('dashboard-index.subdomains_certificate-expired') }}</h2>
            </div>

            @include ('domains.subdomain.molecules.list-certificate', ['list' => $subdomains_certificate_expired])
        </div>
    </div>

    @endif

    @if ($subdomains_certificate_expires_next->isNotEmpty())

    <div class="break-inside p-4">
        <div class="box">
            <div class="p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">{{ __('dashboard-index.subdomains_certificate-expires-next') }}</h2>
            </div>

            @include ('domains.subdomain.molecules.list-certificate', ['list' => $subdomains_certificate_expires_next])
        </div>
    </div>

    @endif
</div>

@stop