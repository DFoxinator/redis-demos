<?php

require __DIR__ . '/../bootstrap/cli.php';

$redis_client = new Redis();
$redis_client->connect('127.0.0.1');

$user_inactive_timeout_seconds = 5;

$current_time = time();
$last_active_time_cutoff = $current_time - $user_inactive_timeout_seconds;

$info = $redis_client->multi()
  ->zCount('users', $last_active_time_cutoff, $current_time)
  ->zCount('users', '-inf', '+inf')
  ->exec();

echo 'Number users online: ' . $info[0] . "\n";
echo 'Number users in the set: ' . $info[1] . "\n";

/*$info = $redis_client->multi()
  ->zCount('users', $last_active_time_cutoff, $current_time)
  ->zCount('users', '-inf', '+inf')
  ->zRemRangeByScore('users', 0, $last_active_time_cutoff)
  ->zCount('users', $last_active_time_cutoff, $current_time)
  ->zCount('users', '-inf', '+inf')
  ->exec();

echo 'Number users online before cleanup: ' . $info[0] . "\n";
echo 'Number users in the set before cleanup: ' . $info[1] . "\n";
echo 'Number users online after cleanup: ' . $info[3] . "\n";
echo 'Number users in the set after cleanup: ' . $info[4] . "\n";*/
