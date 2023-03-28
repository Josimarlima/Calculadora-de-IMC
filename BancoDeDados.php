<?php
require_once 'pessoa.php';
class BancoDeDados
{

    private $host = 'localhost';
    private $db_name = 'calculadoraimc';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function getConnection()
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->pdo;
    }


    public function __construct($db_name, $username, $password)
    {
        $this->pdo = new PDO($db_name, $username, $password);
    }

    // Insere um registro na tabela de IMCs
    public function inserirIMC($altura, $peso)
    {
        $pessoa = new Pessoa($altura, $peso);
        $imc = $pessoa->calcularIMC();
        $pesoIdeal = $pessoa->calcularPesoIdeal();
        $classificacao = $pessoa->getClassificacao();

        $stmt = $this->pdo->prepare('INSERT INTO imc (altura, peso, imc, pesoIdeal, classificacao) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$altura, $peso, $imc, $pesoIdeal, $classificacao]);
    }

    // Recupera todos os registros da tabela de IMCs
    public function listarIMCs()
    {
        $stmt = $this->pdo->query('SELECT * FROM imc');
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($registros as &$registro) {
            $pessoa = new Pessoa($registro['altura'], $registro['peso']);
            $registro['imc'] = $pessoa->calcularIMC();
            $registro['classificacao'] = $pessoa->getClassificacao();
            $registro['pesoIdeal'] = $pessoa->calcularPesoIdeal();
        }

        return $registros;
    }


    // Remove um registro da tabela de IMCs com base em seu ID
    public function removerIMC($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM imc WHERE id = ?');
        $stmt->execute([$id]);
    }
}
