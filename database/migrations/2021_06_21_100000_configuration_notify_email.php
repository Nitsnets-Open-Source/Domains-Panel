<?php declare(strict_types=1);

use App\Domains\Configuration\Model\Configuration as Model;
use App\Domains\Shared\Migration\MigrationAbstract;

return new class extends MigrationAbstract {
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
        Model::where('key', 'domain_notify_domain_expires_email')->update([
            'key' => 'notify_email',
            'description' => 'Correo de notificaciones',
        ]);

        Model::where('key', 'subdomain_notify_certificate_expires_email')->delete();
    }

    /**
     * @return void
     */
    public function down()
    {
        Model::where('key', 'notify_email')->update([
            'key' => 'domain_notify_domain_expires_email',
            'description' => 'Correo de notificación de caducidad de dominios',
        ]);

        Model::insert([
            'key' => 'subdomain_notify_certificate_expires_email',
            'value' => (Model::where('key', 'domain_notify_domain_expires_email')->first()->value ?? 'devops@nitsnets.com'),
            'description' => 'Correo de notificación de caducidad de los certificados',
        ]);
    }
};
