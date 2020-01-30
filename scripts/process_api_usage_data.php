<?php

require __DIR__ . '/../bootstrap/cli.php';

$redis_client = new Redis();
$redis_client->connect('127.0.0.1');

$info = $redis_client->multi()
  ->zRange('api_usages', 0, -1, true)
  ->zRemRangeByScore('api_usages', '-inf', 'inf')
  ->exec();


//$info = $redis_client->multi()
//  ->zRange('api_usages', -2, -1, true)
//  ->zRemRangeByRank('api_usages', -2, -1)
//  ->exec();


/**
 * format is: Array
              (
                [client_7:write] => 580
                [client_1:read] => 582
                [client_2:read] => 588
                [client_2:write] => 590
                [client_9:write] => 592
                [client_9:read] => 593
                [client_4:read] => 594
                [client_5:write] => 594
                [client_6:write] => 603
                [client_8:write] => 607
                [client_3:write] => 611
                [client_6:read] => 613
                [client_3:read] => 615
                [client_7:read] => 615
                [client_5:read] => 622
                [client_10:write] => 626
                [client_4:write] => 626
                [client_1:write] => 632
                [client_8:read] => 635
                [client_10:read] => 636
              )
 */

$api_usage_info = $info[0];

$api_usage_by_client_id = [];

foreach ($api_usage_info as $client_id_and_usage_type => $count) {

  [$client_id, $usage_type] = explode(':', $client_id_and_usage_type);

  if (!isset($api_usage_by_client_id[$client_id])) {
    $api_usage_by_client_id[$client_id] = ['read' => 0, 'write' => 0];
  }

  $api_usage_by_client_id[$client_id][$usage_type] += $count;

}

ksort($api_usage_by_client_id, SORT_NATURAL);

foreach ($api_usage_by_client_id as $client_id => $usage_info) {

  // do some processing of the data and update in the persistent store

  echo 'Client id "' . $client_id . '" usage: ' . $usage_info['read'] . ' read(s), ' . $usage_info['write'] . ' write(s)' . "\n";

}
