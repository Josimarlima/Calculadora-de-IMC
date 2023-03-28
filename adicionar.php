<?php
session_start();
// Incluir o arquivo da classe BancoDeDados
require_once ('BancoDeDados.php');

// Criar uma instância da classe BancoDeDados
$bancoDeDados = new BancoDeDados('mysql:host=localhost;dbname=calculadoraimc', 'root', '');



// Verificar se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validar a entrada do usuário
    $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
    $regex = "/^[1-9][0-9]*\.?[0-9]+$/";

    if ($altura && $peso) {
        // Os campos foram preenchidos corretamente
        if (preg_match($regex, $altura) && preg_match($regex, $peso)) {
            // Altura e peso são números decimais maiores que zero
            $imc = $peso / ($altura * $altura);
            // Calcular o peso ideal
            $pesoIdeal = (72.7 * $altura) - 58;
            // Definir a classificação com base no IMC
            if ($imc < 18.5) {
                $classificacao = 'Abaixo do peso';
            } elseif ($imc < 25) {
                $classificacao = 'Peso normal';
            } elseif ($imc < 30) {
                $classificacao = 'Sobrepeso';
            } else {
                $classificacao = 'Obesidade';
            }
            // Adicionar o registro à tabela de IMCs
            $bancoDeDados->inserirIMC($altura, $peso, $imc, $pesoIdeal, $classificacao);
            // Redirecionar para a página inicial
            $_SESSION['validacao-sucesso'] = '<div class="validacao-sucesso">Registro adicionado com sucesso.</div>';
            header('Location: index.php');
            exit;
        } else {
            // Altura e peso devem ser números decimais maiores que zero
            $_SESSION['validacao-erro'] = '<div class="validacao-erro">Altura e peso devem ser números decimais maiores que zero.</div>';
        }
    } else {
        // Pelo menos um dos campos não é um número válido
        $_SESSION['validacao-erro'] = '<div class="validacao-erro">Por favor, insira valores numéricos válidos para altura e peso.</div>';
    }
}

// Redirecionar para a página inicial
header('Location: index.php');
exit;
