<?php

return [
    'authorization' => [
        'user_class'     => 'User',
        'user_namespace' => 'App\\Models',
        'user_var_name'  => 'user',
        'user_title'     => 'User',
    ],

    'query' => [
        'namespace' => 'App\\QueryBuilders',
        'path'      => 'app'.DIRECTORY_SEPARATOR.'QueryBuilders',
    ],

    'model' => [
        'namespace' => 'App\\Models',
        'path'      => 'app' . DIRECTORY_SEPARATOR . 'Models',
    ],

    'resource' => [
        'namespace' => 'App\\Http\\Resources',
        'path'      => 'app' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Resources',
    ],

    'test' => [
        'namespace'       => 'Tests\\Feature\\Api\\Endpoints',
        'path'            => 'tests'.DIRECTORY_SEPARATOR.'Feature'.DIRECTORY_SEPARATOR.'Api'.DIRECTORY_SEPARATOR.'Endpoints',
        'api_path_prefix' => 'api',
    ],

    'database_seeder_path' => 'database'.DIRECTORY_SEPARATOR.'seeders'.DIRECTORY_SEPARATOR.'DatabaseSeeder.php',
    'route_path'           => 'routes'.DIRECTORY_SEPARATOR.'api.php',
];
