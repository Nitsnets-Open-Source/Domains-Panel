<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domains\Configuration\Seeder\Configuration as Seeder;
use App\Domains\Shared\Migration\MigrationAbstract;

return new class extends MigrationAbstract {
    /**
     * @return void
     */
    public function up()
    {
        if ($this->upMigrated()) {
            return;
        }

        $this->tables();
        $this->seed();
    }

    /**
     * @return bool
     */
    protected function upMigrated(): bool
    {
        return Schema::hasTable('configuration');
    }

    /**
     * @return void
     */
    protected function tables()
    {
        Schema::create('configuration', function (Blueprint $table) {
            $table->id();

            $table->string('key')->unique();
            $table->string('value')->default('');
            $table->string('description')->default('');

            $table->boolean('public')->default(0);

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);
        });
    }

    /**
     * @return void
     */
    protected function seed()
    {
        (new Seeder())->run();
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuration');
    }
};
