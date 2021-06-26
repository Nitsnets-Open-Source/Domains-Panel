<?php declare(strict_types=1);

namespace App\Domains\User\Command;

class Update extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'user:update {--id=} {--email=} {--name=} {--enabled=} {--password=}';

    /**
     * @var string
     */
    protected $description = 'Update User with {--email=} {--name=} {--enabled=} {--password=} by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->requestWithOptions();

        $this->info($this->factory()->action()->updateSimple()->only('id', 'email', 'name', 'enabled'));
    }
}
