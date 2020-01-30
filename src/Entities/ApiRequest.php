<?php

namespace RedisDemos\Entities;

class ApiRequest {

  const REQUEST_TYPES = ['read', 'write'];

  const NUM_CLIENT_IDS = 10;
  const MIN_SECONDS_ACTION_INTERVAL = 0;
  const MAX_SECONDS_ACTION_INTERVAL = 2;

  private string $_client_id;
  private string $_request_type;

  public function __construct() {

    $this->_client_id = 'client_' . mt_rand(1, self::NUM_CLIENT_IDS);
    $this->_request_type = self::REQUEST_TYPES[array_rand(self::REQUEST_TYPES)];

  }

  public function getClientId() : string {

    return $this->_client_id;

  }

  public function getRequestType() : string {

    return $this->_request_type;

  }

  public function performApiAction() : void {

    sleep(mt_rand(self::MIN_SECONDS_ACTION_INTERVAL, self::MAX_SECONDS_ACTION_INTERVAL));

  }

}
