<?php
class Database {
private $host = 'localhost';
private $db_name = 'calculadoraimc';
private $username = 'root';
private $password = '';
private $pdo;

public function getConnection() {
$this->pdo = null;

try {
$this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo 'Connection Error: ' . $e->getMessage();
}

return $this->pdo;
}
}