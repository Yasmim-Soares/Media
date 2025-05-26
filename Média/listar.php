<?php
require_once 'ClassAlunoDAO.php';
$alunoDAO=new ClassAlunoDAO();
$alunos = $alunoDAO->listarAlunos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="listar">
    <div class="container">
        <h2>Lista de Alunos</h2>
        <table border=1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Média</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?php echo $aluno['id']?>          </td>
                    <td><?php echo $aluno['nome_aluno']?>  </td>
                    <td><?php echo $aluno['nota1']?>       </td>
                    <td><?php echo $aluno['nota2']?>       </td>
                    <td><?php echo $aluno['media']?>        </td>
                    <td>   
                    <a href="excluir.php?id=<?php echo $aluno['id'];?>">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <center>
            <button class="btn" ><a href="index.php">Cadastrar Novo Aluno</a></button>
        </center>
    </div>
</body>
</html>