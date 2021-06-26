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
        Schema::disableForeignKeyConstraints();

        $this->drop();

        Schema::enableForeignKeyConstraints();

        $this->tables();
        $this->keys();
    }

    /**
     * @return void
     */
    protected function tables()
    {
        Schema::create('check', function (Blueprint $table) {
            $table->id();

            $table->string('type')->index();
            $table->string('value')->index();
            $table->string('status')->nullable()->index();

            $table->json('details')->nullable();

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);

            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('subdomain_id')->nullable();
            $table->unsignedBigInteger('url_id')->nullable();
        });

        Schema::create('configuration', function (Blueprint $table) {
            $table->id();

            $table->string('key')->unique();
            $table->string('value')->default('');
            $table->string('description')->default('');

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);
        });

        Schema::create('domain', function (Blueprint $table) {
            $table->id();

            $table->string('host')->unique();
            $table->string('status')->nullable()->index();

            $table->string('certificate_status')->nullable();
            $table->datetime('certificate_expires_at')->nullable();
            $table->datetime('certificate_checked_at')->nullable();

            $table->string('domain_status')->nullable();
            $table->date('domain_expires_at')->nullable();
            $table->datetime('domain_checked_at')->nullable();
            $table->boolean('domain_enabled')->default(0);

            $table->string('ping_status')->nullable();
            $table->datetime('ping_checked_at')->nullable();

            $table->string('subdomain_status')->nullable();
            $table->datetime('subdomain_checked_at')->nullable();
            $table->boolean('subdomain_enabled')->default(0);

            $table->string('url_status')->nullable();
            $table->datetime('url_checked_at')->nullable();

            $table->boolean('enabled');

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);

            $table->unsignedBigInteger('user_id')->nullable();
        });

        Schema::create('ip_lock', function (Blueprint $table) {
            $table->id();

            $table->string('ip')->default('');

            $table->datetime('end_at')->nullable();

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);
        });

        Schema::create('queue_fail', function (Blueprint $table) {
            $table->id();

            $table->text('connection');
            $table->text('queue');

            $table->longText('payload');
            $table->longText('exception');

            $table->timestamp('failed_at')->useCurrent();

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);
        });

        Schema::create('subdomain', function (Blueprint $table) {
            $table->id();

            $table->string('host')->unique();
            $table->string('status')->nullable()->index();

            $table->string('certificate_status')->nullable();
            $table->datetime('certificate_expires_at')->nullable();
            $table->datetime('certificate_checked_at')->nullable();
            $table->boolean('certificate_enabled')->default(0);

            $table->string('ping_status')->nullable();
            $table->datetime('ping_checked_at')->nullable();
            $table->boolean('ping_enabled')->default(0);

            $table->string('url_status')->nullable();
            $table->datetime('url_checked_at')->nullable();
            $table->boolean('url_enabled')->default(0);

            $table->boolean('enabled');

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);

            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('user_id')->nullable();
        });

        Schema::create('url', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('status')->nullable()->index();

            $table->unsignedFloat('time')->nullable();
            $table->unsignedSmallInteger('code')->nullable();

            $table->datetime('checked_at')->nullable();

            $table->boolean('enabled');

            $this->dateTimeCreatedAt($table);
            $this->dateTimeUpdatedAt($table);

            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('subdomain_id');
            $table->unsignedBigInteger('user_id')->nullable();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id();

            $table->string('name')->default('');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();

            $table->datetime('activated_at')->nullable();

            $table->boolean('enabled')->default(0);

            $this->timestamps($table);
        });

        Schema::create('user_session', function (Blueprint $table) {
            $table->id();

            $table->string('auth')->index();
            $table->string('ip')->index();

            $table->boolean('success')->default(0);

            $this->dateTimeCreatedAt($table);

            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Set the foreign keys.
     *
     * @return void
     */
    protected function keys()
    {
        Schema::table('check', function (Blueprint $table) {
            $this->foreignOnDeleteCascade($table, 'domain');
        });

        Schema::table('domain', function (Blueprint $table) {
            $this->foreignOnDeleteSetNull($table, 'user');
        });

        Schema::table('subdomain', function (Blueprint $table) {
            $table->unique(['host', 'domain_id']);

            $this->foreignOnDeleteCascade($table, 'domain');
            $this->foreignOnDeleteSetNull($table, 'user');
        });

        Schema::table('url', function (Blueprint $table) {
            $table->unique(['url', 'subdomain_id']);

            $this->foreignOnDeleteCascade($table, 'domain');
            $this->foreignOnDeleteCascade($table, 'subdomain');
            $this->foreignOnDeleteSetNull($table, 'user');
        });

        Schema::table('user_session', function (Blueprint $table) {
            $this->foreignOnDeleteSetNull($table, 'user');
        });
    }
};
