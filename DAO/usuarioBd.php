<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/users.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";


function autenticar (Users $user) {

    $cpf = $user->getCpf();
    $pass_sent = $user->getPassword();
    
    $conexao = connect();
    
    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result)>0){
        $actualPass = $result[0]['senha'];
        if(password_verify($pass_sent, $actualPass)){
            return $result[0];
        } else {
            return false;
        }
    } else {
        return false;
    }


}

 function autenticar_email(Users $user) {
    $email=$user->getEmail();

    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
 }

 function autenticar_cpf(Users $user){
    $cpf=$user->getCpf();

    $conexao = connect();

    $stmt = $conexao->prepare("SELECT * FROM usuarios where cpf = :cpf");
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();

    $result = $stmt->fetchAll();

    return $result;
}
function getUserInfo($id){
    $PDO = connect();
    $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $stmt = $PDO->prepare($query);
    $stmt->execute([$id]);
    foreach ($stmt->fetchAll() as $result) {
        $user = new Users;

        $user->setName($result['nome']);
        $user->setCpf($result['cpf']);
        $user->setTell($result['telefone']);
        $user->setEmail($result['email']);
    }
    return $user;
}