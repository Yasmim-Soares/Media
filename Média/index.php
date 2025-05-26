<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Média Aluno</h2>
        <form action="mediaAluno.php" method="POST">
            <div class="form-group">
                <label for="nome_aluno">Nome</label>
                <input type="text"   name="nome_aluno" placeholder="Ex: Yasmim"  >
            </div>
            <div class="form-group">
                <label for="nota1">Nota do 1° Semestre:</label>
                <input type="text"  name="nota1" placeholder="Ex: 10.0" >
            </div>
            <div class="form-group">
                <label for="nota2">Nota do 2° Semestre:</label>
                <input type="text"  name="nota2" placeholder="Ex: 10.0" >
            </div>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
           <br>
           <center>
            <button class="btn" ><a href="listar.php">Listar Alunos</a></button>
           </center>
    </div>

</body>
</html>
