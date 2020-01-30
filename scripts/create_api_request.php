<?php

// supervisord -n -c conf/supervisor_create_api_requests.conf

require __DIR__ . '/../bootstrap/cli.php';

$redis_client = new Redis();
$redis_client->connect('127.0.0.1');

$api_request = new \RedisDemos\Entities\ApiRequest();

$api_request->performApiAction();

$redis_client->zIncrBy('api_usages', 1, $api_request->getClientId() . ':' . $api_request->getRequestType());
