<?php



class Model
{
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'devalliance';
  protected $pdo;

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

    // Create a PDO instance
    $this->pdo = new PDO($dsn, $this->user, $this->password);
    $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    //$this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
  }
  protected $tableName;

  /**
   * Insert submitted information
   */
  public function create($data)
  {
    $i = 1;
    $tData = [];
    $sql = "INSERT INTO " . $this->tableName . " (";

    foreach ($data as $key => $value) {
      $sql .= $key;
      if ($i != count($data)) $sql .= ', ';
      $tData[':' . $key] = $value;
      $i++;
    }

    $sql .= ") VALUES (";
    $i = 1;
    foreach ($data as $key => $value) {
      $sql .= ':' . $key;
      if ($i != count($data)) $sql .= ', ';
      $i++;
    }

    $sql .= ");";

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($tData);
  }
}
