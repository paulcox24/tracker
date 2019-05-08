<?php

namespace PragmaRX\Tracker\Support;

use PragmaRX\Support\PhpSession;

class FastSession extends PhpSession
{

  public function __construct($namespace = null)
  {
    $this->startSession();
    session_write_close();

    $this->setNamespace($namespace);
  }

  private function startSession()
  {
    if ( !$this->isStarted())
    {
      session_start();
    }
  }

  private function isStarted()
  {
    return session_status() === PHP_SESSION_ACTIVE;
  }

  public function put($key, $value, $namespace = null)
  {
    $this->startSession();
    parent::put($key, $value, $namespace = null);
  }

}
