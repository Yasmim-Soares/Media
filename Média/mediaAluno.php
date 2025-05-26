<?php
require_once 'ClassAluno.php';
require_once 'ClassAlunoDAO.php';

if (isset($_POST['nome_aluno']) && isset($_POST['nota1']) && isset($_POST['nota2'])) {
    $nome_aluno = $_POST['nome_aluno'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];

    $novoAluno = new ClassAluno();
    $novoAluno->setNome_Aluno($nome_aluno);
    $novoAluno->setNota1($nota1);
    $novoAluno->setNota2($nota2);

    $ClassAlunoDAO = new ClassAlunoDAO();
    if ($ClassAlunoDAO->cadastrarAluno($novoAluno)) {
    } 
} else {
    echo "ERRO";
}
?>