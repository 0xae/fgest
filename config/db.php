<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=fgest',
    'username' => 'root',
    'password' => getenv('FGEST_DB_PASSWORD'),
    'charset' => 'utf8',
];
