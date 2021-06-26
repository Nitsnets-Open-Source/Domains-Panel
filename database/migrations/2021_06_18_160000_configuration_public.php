<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
    }

    /**
     * @return bool
     */
    protected function upMigrated(): bool
    {
        return Schema::hasColumn('configuration', 'public') === false;
    }

    /**
     * @return void
     */
    protected function tables()
    {
        Schema::table('configuration', function (Blueprint $table) {
            $table->dropColumn('public');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::table('configuration', function (Blueprint $table) {
            $table->boolean('public')->default(0)->after('description');
        });
    }
};
