<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();// No debe de haber dos usuarios con el mismo nombre
        });
        /*
            En la consola ejecutar el siguiente codigo para que se borre la migracion
            php artisan migrate:rollback --step=1 // El step sirve para saber que eliminacion eliminar

            Y vuelves a migrar para que se actualizen los cambio
            php artisan migrate

            Si se quiere eliminar todos los registros en las tablas se usa:
            php artisan migrate:refresh

            Recordatorio cuando subes al git la carpeta vendedor no se sube y esla carpeta de las dependencia para que el php artisan funcione
            se debe de volver a generar en la consola con "composer install", en la misma ruta del archivo (RECORDAR QUE LAS VERSIONES DEL COMPOSER Y EL PHP "COINCIDAN")

            Las carpetas vendedor, .env, lang; su informacion no puede ser subida al repositorio por lo cual se debe de generar
                la de .env debes de traerla de un proyecto anterior andemas que en la consola debes de ejecutar "php artisan key:generate"
                la de lang tienes que tambien traerlo de un proyecto anterior
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
