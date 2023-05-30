<?php
require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->cadastrar($nome,$email,$senha)){
        echo "Erro ao cadastrar!";
    }else{
        echo "Cadastro realizado com sucesso!";
    }
}

?>


<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
</head>
<body>
   <form action="" method="POST"> 
    <label for="">Nome de Usuario:</label>
    <input type="text" name="nome" placeholder="Nome de usuario">
    <label for="">Email:</label>
    <input type="email" name="email" placeholder="Email">
    <label for="">Senha</label>
    <input type="password" name="senha" placeholder="senha">
    <input type="submit" name="cadastrar" value="Cadastrar">
   </form> 
   <a href="index.php">Voltar</a>
</body>
</html>