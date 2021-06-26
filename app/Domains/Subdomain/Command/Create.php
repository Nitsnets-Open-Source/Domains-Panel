<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

use App\Domains\Shared\Command\CommandAbstract;

class Create extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:create {--host=} {--user_id=} {--enabled} {--subsubdomain}';

    /**
     * @var string
     */
    protected $description = 'Create Subdomain with {--host=} {--user_id=} {--enabled} {--subsubdomain}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->checkOptions(['host', 'user_id']);

        $this->actingAs($this->option('user_id'));

        $this->requestWithOptions();

        $row = $this->factory()->action()->create();

        $this->info(sprintf('Created Subdomain %s with ID %s', $row->host, $row->id));
    }
}
