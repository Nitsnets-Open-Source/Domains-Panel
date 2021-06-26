<?php declare(strict_types=1);

namespace App\Domains\User\Command;

class Create extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'user:create {--email=} {--name=} {--password=}';

    /**
     * @var string
     */
    protected $description = 'Create User with {--email=} {--name=} {--password=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->requestWithOptions();

        $row = $this->factory()->action()->create();

        $this->info(sprintf('Created User %s with ID %s', $row->email, $row->id));
    }
}
