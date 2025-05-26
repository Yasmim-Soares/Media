<?php
require_once 'Conexao.php';

class ClassAlunoDAO
{
    public function cadastrarAluno($novoAluno)
    {  
        if($novoAluno->getNome_aluno()!= null && $novoAluno->getNota1() != null && $novoAluno->getNota2() != null){
        try {
            $pdo = Conexao::getInstance(); 
            $sql = 'insert into notas(nome_aluno, nota1, nota2) values(?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $novoAluno->getNome_aluno());
            $stmt->bindValue(2, $novoAluno->getNota1());
            $stmt->bindValue(3, $novoAluno->getNota2());
            $stmt->execute();
            echo "<center><h1>Cadastro realizado com sucesso!</h1></center><br>";
            return true;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    } else {
        echo "<center><h1>Preencha todos os campos!</h1></center><br>";
        return false;
    }
    }
    public function listarAlunos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * from semestre";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return [];
        }
    }

   function deletar($id){
    try{
        $pdo = Conexao::getInstance();
        $sql="delete from notas where id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
  }
} 
?>
