<?php

namespace Config;

trait Db
{
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'devalliance';
  protected $pdo;
  protected $stmt; 

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    
    // Create a PDO instance
    $this->pdo = new \PDO($this->dsn, $this->user, $this->password);
    $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    //$this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
  }
}