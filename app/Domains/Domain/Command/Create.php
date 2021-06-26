<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

use App\Domains\Shared\Command\CommandAbstract;

class Create extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:create {--host=} {--user_id=} {--enabled} {--subdomain}';

    /**
     * @var string
     */
    protected $description = 'Create Domain with {--host=} {--user_id=} {--enabled} {--subdomain}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->checkOptions(['host', 'user_id']);

        $this->actingAs($this->option('user_id'));

        $this->requestWithOptions();

        $row = $this->factory()->action()->create();

        $this->info(sprintf('Created Domain %s with ID %s', $row->host, $row->id));
    }
}
