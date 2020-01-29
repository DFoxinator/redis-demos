<?php

namespace RedisDemos\Entities;

class User {

  const MIN_SECONDS_TTL = 1;
  const MAX_SECONDS_TTL = 120;
  const MIN_SECONDS_ACTION_INTERVAL = 1;
  const MAX_SECONDS_ACTION_INTERVAL = 40;

  private string $_identifier;
  private int $_online_until_timestamp;

  public function __construct() {

    $this->_identifier = uniqid('', true) . mt_rand(0, 9999999);
    $this->_online_until_timestamp = time() + mt_rand(self::MIN_SECONDS_TTL, self::MAX_SECONDS_TTL);

  }

  public function getIdentifier() : string {

    return $this->_identifier;

  }

  public function isOnline() : bool {

    return time() <= $this->_online_until_timestamp;

  }

  public function waitForActionPerformed() : void {

    sleep(mt_rand(self::MIN_SECONDS_ACTION_INTERVAL, self::MAX_SECONDS_ACTION_INTERVAL));

  }

}