<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

use App\Domains\Shared\Command\CommandAbstract;

class Create extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:create {--host=} {--domain_id=} {--user_id=} {--enabled} {--certificate_enabled} {--ping_enabled} {--url_enabled}';

    /**
     * @var string
     */
    protected $description = 'Create Subdomain with {--host=} {--domain_id=} {--user_id=} {--enabled} {--certificate_enabled} {--ping_enabled} {--url_enabled}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->checkOptions(['host', 'domain_id', 'user_id']);

        $this->actingAs($this->option('user_id'));

        $this->requestWithOptions();

        $row = $this->factory()->action()->create();

        $this->info(sprintf('Created Subdomain %s with ID %s', $row->host, $row->id));
    }
}
