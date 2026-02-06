<?php
/**
 * Конфигурации для интеграций со сторонними сервисами
 * @docs https://github.com/laravel/laravel/blob/11.x/config/services.php
 */

return [
    'dummyjson' => [
        'base_url' => env('DUMMYJSON_API_BASE_URL', 'https://dummyjson.com'),
        'username' => env('DUMMYJSON_API_USERNAME', ''),
        'password' => env('DUMMYJSON_API_PASSWORD', ''),
    ]
];
