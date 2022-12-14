<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/usuarioBd.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/model/users.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/project_PI/DAO/connection.php";

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$tell = $_POST['tell'];
$email = $_POST['email'];
$pass_sent = $_POST['pass'];
$passCounter = strlen($pass_sent);
$pass = password_hash($pass_sent, PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);

$Users = new Users();

$Users->setName($name);
$Users->setCpf($cpf);
$Users->setTell($tell);
$Users->setEmail($email);
$Users->setPassword($pass_sent);

if($passCounter > 6) {

	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result_email = autenticar_email($Users);
		
		if(count($result_email)<1) {
			$result_cpf = autenticar_cpf($Users);

			if(count($result_cpf)<1) {
				$data = [
				    'nome' => $name,
				    'cpf' => $cpf,
				    'telefone' => $tell,
				    'email' => $email,
				    'senha' => $pass,
				];

				$conexao = connect();
				$sql = "INSERT INTO usuarios (nome, cpf, telefone, email, senha) VALUES (:nome, :cpf, :telefone, :email, :senha)";

				$stmt= $conexao->prepare($sql);

				$stmt->execute($data);

				$result = autenticar($Users);
				
				if (count($result)>0) {
					
					$answer['status'] = true;
					session_start();
			    	$_SESSION['autenticado'] = true;
			    	$_SESSION['usuario'] = $result;

				} else{
				    $answer['msg'] = "Erro ao cadastrar";
							$answer['status'] = false;
				}
			
			}else{
				$answer['msg'] = "Cpf ja cadastrado";
				$answer['status'] = false;
			}

		}else{
			$answer['msg'] = "Email ja cadastrado";
			$answer['status'] = false;
		}
	}else{
		$answer['msg'] = "Email invalido";
		$answer['status'] = false;

	}
}else{
		$answer['msg'] = "Senha deve ter ao menos 6 digitos";
		$answer['status'] = false;
}

echo json_encode($answer);