## Panel de Control para Gestión de Dominios

Esta aplicación permite la gestión interna de dominios de una manera sencilla.

Podrás dar de alta dominios para controlar su caducidad, subdominios para controlar si están online y su certificado y URLs para comprobar si responden un código 200 y registrar los tiempos de respuesta.

### Tecnología

Laravel 8 + PHP 8 + MySQL 8

### Requisitos

- PHP 8.0 o superior (php-curl php-mbstring php-mysql php-redis php-xml php-zip)
- MySQL

### Instalación

1. Creamos la base de datos en MySQL.

2. Clonamos el repositorio.

```bash
git clone https://github.com/nitsnets/Domains-Panel.git
```

3. Realizamos la primera instalación (recuerda que siempre usando el binario de PHP 8.0).

```bash
composer install --no-scripts && composer install
```

4. Configuramos el fichero `.env` con los datos necesarios.

```bash
cp .env.example .env
```

5. Generamos la clave de aplicación.

```bash
php artisan key:generate
```

6. Regeneramos las cachés.

```bash
composer artisan-cache
```

7. Lanzamos la migración inicial.

```bash
php artisan migrate
```

8. Lanzamos el seeder.

```bash
php artisan db:seed --class=Database\\Seeders\\Database
```

9. Configuramos la tarea cron para el usuario relacionado con el proyecto:

```
* * * * * cd /var/www/status.domains.com/httpdocs && php artisan schedule:run >> storage/logs/artisan-schedule-run.log 2>&1
```

10. Creamos el usuario de acceso (El alta de usuarios sólo está disponible desde terminal).

```bash
php artisan user:create --email=user@domain.com --name=Admin --password=StrongPassword2
```

11. Configuramos el servidor para acceso web con `DOCUMENT_ROOT` en `public`.

12. Profit!

### Notas

Para obtener las fechas de caducidad de los dominios se usan varios servicios diferentes.

Para los dominios genéricos se usan unos servidores de whois públicos, que puedes consultar en el [fichero de configuración](config/whois.php).

Para los dominios con whois privados (como los `.es`) existen ahora mismo varias APIs configurables:

* [`Dinahosting`](https://es.dinahosting.com/api/) permite realizar sólo whois a los dominios asociados a tu usuario de API.
* [`DonDominio`](https://dev.dondominio.com/api/docs/start/) permite realizar sólo whois a los dominios asociados a tu usuario de API.
* [`WhoisXmlApi`](https://main.whoisxmlapi.com/signup) servicio genérico con acceso a múltiples whois privados.

### Capturas

![domains-panel-01](https://user-images.githubusercontent.com/644551/123480098-2725cf00-d602-11eb-9c18-2842e1fb9d38.png)

![domains-panel-02](https://user-images.githubusercontent.com/644551/123480101-27be6580-d602-11eb-836a-1c4f095f2ae3.png)

![domains-panel-03](https://user-images.githubusercontent.com/644551/123480102-2856fc00-d602-11eb-85df-2b4fa45dae0b.png)

![domains-panel-04](https://user-images.githubusercontent.com/644551/123480105-2856fc00-d602-11eb-8631-73eb83888c25.png)

![domains-panel-05](https://user-images.githubusercontent.com/644551/123480108-28ef9280-d602-11eb-8cf0-adcf8fd40562.png)

![domains-panel-06](https://user-images.githubusercontent.com/644551/123480110-29882900-d602-11eb-944d-c00c42104538.png)

![domains-panel-07](https://user-images.githubusercontent.com/644551/123480111-29882900-d602-11eb-974d-225ef7de7477.png)

![domains-panel-08](https://user-images.githubusercontent.com/644551/123480114-2a20bf80-d602-11eb-9270-f95757cc6e96.png)

![domains-panel-09](https://user-images.githubusercontent.com/644551/123480115-2a20bf80-d602-11eb-8ba1-f48c8cc65e18.png)

![domains-panel-10](https://user-images.githubusercontent.com/644551/123480117-2ab95600-d602-11eb-9321-c94c50ee8ef8.png)

![domains-panel-11](https://user-images.githubusercontent.com/644551/123480118-2b51ec80-d602-11eb-9197-d57a176565fa.png)
