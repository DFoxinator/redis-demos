<?php

// supervisord -n -c conf/supervisor_users_online.conf

require __DIR__ . '/../bootstrap/cli.php';

$redis_client = new Redis();
$redis_client->connect('127.0.0.1');

$user = new \RedisDemos\Entities\User();

while ($user->isOnline()) {

  $user->waitForActionPerformed();

  // add/update item in sorted set, params are: key, options, score, value
  $redis_client->zAdd('users', [], time(), $user->getIdentifier());

}
