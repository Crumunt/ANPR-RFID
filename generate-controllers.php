<?php

$models = glob('app/Models/*.php');

foreach ($models as $model) {
    $modelName = basename($model, '.php');
    $controllerName = $modelName . 'Controller';
    echo "Creating controller for $modelName...\n";
    shell_exec("php artisan make:controller $controllerName");
    echo "$controllerName created successfully.\n";
}
