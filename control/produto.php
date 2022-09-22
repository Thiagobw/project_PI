<?php

include_once "../DAO/connection.php";

$prod=$_POST['prod'];

$conexao = connect();
$stmt = $conexao->prepare("SELECT * FROM produtos where nome_produto = :nome_produto");
$stmt->bindValue(':nome_produto', $prod);

$stmt->execute();
$result = $stmt->fetchAll();

if(count($result)>0) {
	if($result[0]['quantidade'] > 0){

			$data = [
			    'quantidade' => $result[0]['quantidade']-1,
			    'id' => $result[0]['id_produtos'],
			];

			$conexao = connect();
			$sql = "UPDATE produtos SET quantidade=:quantidade WHERE id_produtos=:id";

			$stmt= $conexao->prepare($sql);

			$stmt->execute($data);

			$data2 = [
			    'quantidade' => '1',
			    'valor' => $result[0]['preco_produto'],
			    'Produtos_idProdutos' => $result[0]['id_produtos'],
			];

			$sql2 = "INSERT INTO pedido_produto (quantidade, valor, Produtos_idProdutos) VALUES (:quantidade, :valor, :Produtos_idProdutos)";

			$stmt= $conexao->prepare($sql2);


			$stmt->execute($data2);

			$answer['status'] = true;

	}else{

		$answer['msg'] = "Esgotado";
		$answer['status'] = false;
	}

}

echo json_encode($answer);


?>