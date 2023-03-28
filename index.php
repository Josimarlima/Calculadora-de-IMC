<?php
session_start();
require_once('Templates/header.php');

// Verifica se há mensagens de erro para exibir
if (isset($_SESSION['validacao-erro'])) {
    echo '<div class="alert alert-danger">';
    echo $_SESSION['validacao-erro'];
    echo '</div>';
    unset($_SESSION['validacao-erro']);
}

// Verifica se há mensagens de sucesso para exibir
if (isset($_SESSION['validacao-sucesso'])) {
    echo '<div class="alert alert-success">';
    echo $_SESSION['validacao-sucesso'];
    echo '</div>';
    unset($_SESSION['validacao-sucesso']);
}

?>

<form class="container" action="adicionar.php" method="post">
    <div class="form-group">
        <label for="altura">Altura (metros):</label>
        <input type="text" class="form-control" id="altura" placeholder="Digite sua altura" name="altura" required>
    </div>
    <div class="form-group">
        <label for="peso">Peso (quilos):</label>
        <input type="text" class="form-control" id="peso" placeholder="Digite seu peso" name="peso" required>
    </div>
    <button type="submit" class="btn btn-primary" id="calcular">Calcular IMC</button>
</form>



<h2 class="mt-5">Histórico de IMCs</h2>
<div class="container">
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>IMC</th>
                <th>Peso Ideal</th>
                <th>Classificação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Incluir o arquivo da classe BancoDeDados
            require_once('BancoDeDados.php');

            // Criar uma instância da classe BancoDeDados
            $bancoDeDados = new BancoDeDados('mysql:host=localhost;dbname=calculadoraimc', 'root', '');

            // Obter a lista de registros da tabela de IMCs
            //$registros = $bancoDeDados->listarIMCs();

            // Listar todos os registros da tabela de IMCs
            $registros = $bancoDeDados->listarIMCs();

            foreach ($registros as $registro) {

                echo '<tr>';
                echo '<td>' . $registro['id'] . '</td>';
                echo '<td>' . $registro['altura'] . '</td>';
                echo '<td>' . $registro['peso'] . '</td>';
                echo '<td>' . $registro['imc'] . '</td>';
                echo '<td>' . $registro['pesoIdeal'] . '</td>';
                echo '<td>' . $registro['classificacao'] . '</td>';
                echo '<td><a id= BotaoDeletar href="remover.php?id=' . $registro['id'] . '">Remover</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>

<?php
require_once('Templates/footer.php');
?>