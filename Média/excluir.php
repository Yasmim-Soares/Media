<?php
require_once 'ClassAlunoDAO.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $alunos = $alunoDAO;
    $alunoDAO = new ClassAlunoDAO();

    if($alunoDAO->deletar($id)){
        header('Location:listar.php');
        exit;
    } else{
        echo "<center><h1>Erro ao excluir aluno!</h1></center><br>";
    }
} else {
    echo "<center><h1>ID não fornecido!</h1></center><br>";
    header('Location:listar.php');
    exit;
}
?>
