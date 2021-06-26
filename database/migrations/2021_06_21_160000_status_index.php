<?php declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domains\Shared\Migration\MigrationAbstract;

return new class extends MigrationAbstract {
    /**
     * @const
     */
    protected const TABLES = ['check', 'domain', 'subdomain', 'url'];

    /**
     * @return void
     */
    public function up()
    {
        $this->tables();
    }

    /**
     * @return void
     */
    protected function tables()
    {
        foreach (static::TABLES as $table) {
            $this->upTable($table);
        }
    }

    /**
     * @param string $table
     *
     * @return void
     */
    protected function upTable(string $table)
    {
        if ($this->tableHasIndex($table, $table.'_status_index')) {
            return;
        }

        Schema::table($table, function (Blueprint $table) {
            $table->index('status');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        foreach (static::TABLES as $table) {
            $this->downTable($table);
        }
    }

    /**
     * @param string $table
     *
     * @return void
     */
    protected function downTable(string $table)
    {
        if ($this->tableHasIndex($table, $table.'_status_index') === false) {
            return;
        }

        Schema::table($table, function (Blueprint $table) {
            $table->dropIndex(['status']);
        });
    }
};
