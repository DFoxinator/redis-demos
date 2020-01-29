<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(3600);

require __DIR__ . '/../vendor/autoload.php';

$redis_client =  (new Redis())->connect();

$user = new \RedisDemos\Entities\User();

while ($user->hasTakenLastAction()) {



}
