<?php declare(strict_types=1);

use App\Domains\Configuration\Seeder\Configuration as Seeder;
use App\Domains\Shared\Migration\MigrationAbstract;

return new class extends MigrationAbstract {
    /**
     * @return void
     */
    public function up()
    {
        $this->seed();
    }

    /**
     * @return void
     */
    protected function seed()
    {
        (new Seeder())->run();
    }
};
