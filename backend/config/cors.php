<?php

return [
    'paths' => ['api/*', 'login', 'register', 'cars','logout'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://127.0.0.1:5173'],
    'allowed_headers' => ['*'], 
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, 
];
