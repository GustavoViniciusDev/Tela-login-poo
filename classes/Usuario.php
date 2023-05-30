<?php
include('conexao/conexao.php');

$db = new Conexao();

class Usuario{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha)
    {
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $senhaCriptografada);
        $result = $stmt->execute();
    
        return $result;
    }
    

    public function logar($email,$senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();

        if($stmt->rowCount() ==1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($senha, $usuario['senha'])){
                return true;
            }
        }
        return false;

        
        
    }


}

?>