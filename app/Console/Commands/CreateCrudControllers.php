<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCrudControllers extends Command
{
    protected $signature = 'make:crud {names*}';
    protected $description = 'Crear múltiples controladores con CRUD y validaciones';

    public function handle()
    {
        $names = $this->argument('names');

        foreach ($names as $name) {
            $controllerName = "{$name}Controller";
            $requestName = "{$name}Request";

            // Crear el controlador
            $this->call('make:controller', [
                'name' => $controllerName,
                '--resource' => true
            ]);

            // Crear la Request de validación
            $this->call('make:request', [
                'name' => $requestName
            ]);

            // Agregar ejemplo básico de validación en el request
            $requestPath = app_path("Http/Requests/{$requestName}.php");
            file_put_contents($requestPath, str_replace(
                'return [];',
                'return [
                    // Añade tus validaciones aquí
                    "name" => "required|string|max:255",
                ];',
                file_get_contents($requestPath)
            ));

            $this->info("Controlador y validación creados para: {$name}");
        }
    }
}
