<?php

use App\Services\Network\Whois\Service\Dinahosting as DinahostingService;
use App\Services\Network\Whois\Service\DonDominio as DonDominioService;
use App\Services\Network\Whois\Service\Server as ServerService;
use App\Services\Network\Whois\Service\WhoisXmlApi as WhoisXmlApiService;

return [
    ServerService::class => [
        'enabled' => env('WHOIS_SERVER_ENABLED'),
        'servers' => [
            'app' => 'whois.nic.google',
            'cloud' => 'whois.nic.cloud',
            'com' => 'whois.verisign-grs.com',
            'dev' => 'whois.nic.google',
            'fr' => 'whois.nic.fr',
            'gal' => 'whois.dinahosting.com',
            'io' => 'whois.nic.io',
            'net' => 'whois.verisign-grs.net',
            'org' => 'whois.pir.org',
            'pt' => 'whois.dns.pt',
            'travel' => 'whois.nic.travel',
            'tv' => 'tvwhois.verisign-grs.com',
            'uk' => 'whois.nic.uk',
            'us' => 'whois.nic.us',
        ],
    ],
    DinahostingService::class => [
        'host' =>env('WHOIS_DINAHOSTING_API_HOST'),
        'user' => env('WHOIS_DINAHOSTING_API_USER'),
        'password' => env('WHOIS_DINAHOSTING_API_PASSWORD'),
        'enabled' => env('WHOIS_DINAHOSTING_API_ENABLED'),
    ],
    DonDominioService::class => [
        'host' =>env('WHOIS_DONDOMINIO_API_HOST'),
        'user' => env('WHOIS_DONDOMINIO_API_USER'),
        'key' => env('WHOIS_DONDOMINIO_API_KEY'),
        'enabled' => env('WHOIS_DONDOMINIO_API_ENABLED'),
    ],
    WhoisXmlApiService::class => [
        'host' =>env('WHOIS_WHOISXMLAPI_API_HOST'),
        'key' => env('WHOIS_WHOISXMLAPI_API_KEY'),
        'enabled' => env('WHOIS_WHOISXMLAPI_API_ENABLED'),
    ],
];
