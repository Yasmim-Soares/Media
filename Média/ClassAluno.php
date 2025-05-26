<!-- ClassAluno.php -->
<?php
class ClassAluno {
    
    private $id;
    private $nome_aluno;
    private $nota1;
    private $nota2;

     // Métodos Getters
     function getId() {
        return $this->id;
    }

     function getNome_aluno() {
        return $this->nome_aluno;
    }
    
     function getNota1(){
        return $this->nota1;
     }
     
    function getNota2(){
        return $this->nota2;
    } 



    
    // Métodos Setters
    function setId($id) {
        $this->id = $id;
    }
    
    function setNome_Aluno($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }

    function setNota1($nota1) {
        $this->nota1 = $nota1;
    }

    function setNota2($nota2) {
        $this->nota2 = $nota2;
    }
}
