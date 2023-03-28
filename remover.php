<?php

// Incluir o arquivo da classe BancoDeDados
require_once 'BancoDeDados.php';

// Criar uma instância da classe BancoDeDados
$bancoDeDados = new
BancoDeDados('mysql:host=localhost;dbname=calculadoraimc', 'root', '');

// Verificar se o ID foi especificado nos parâmetros da URL
if (isset($_GET['id'])) {

    // Remover o registro da tabela de IMCs com base em seu ID
    $bancoDeDados->removerIMC($_GET['id']);
}

// Redirecionar para a página inicial
header('Location: index.php');
