<?php

//http://www.linhadecodigo.com.br/artigo/244/upload-de-arquivos-em-php.aspx

//script abaixo insere no banco as informações pegas no arquivo get_apadrinhamento.php

if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['termos'])) {
	$falha = false;
	$sucesso = false;

	try {
		$sql = $pdo->prepare("INSERT INTO enderecos SET cep=:cep, estado=:estado, cidade=:cidade, bairro=:bairro, logradouro=:logradouro, complemento=:complemento, numero=:numero;"); //pdo ja foi iniciado no conexao.php
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":estado", $estado); //verificar 
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":logradouro", $logradouro);
		$sql->bindValue(":complemento", $complemento);
		$sql->bindValue(":numero", $numero);
		$sql->execute();
		$id_endereco = $pdo->lastInsertId();
		
		$sql = $pdo->prepare("INSERT INTO interesses SET id_estado=:estado_crianca, genero_crianca=:genero_crianca, idade=:idade;"); //pdo ja foi iniciado no conexao.php
		$sql->bindValue(":estado_crianca", $estado_crianca);
		$sql->bindValue(":genero_crianca", $genero_crianca); //verificar 
		$sql->bindValue(":idade", $idade);
		$sql->execute();
		$id_interesse = $pdo->lastInsertId();
		
		$sql = $pdo->prepare("INSERT INTO apadrinhamentos SET nome=:nome, email=:email, cpf=:cpf, data_nascimento=:data_nascimento, casado=:rel_status, genero=:genero, renda=:renda, id_endereco=:id_endereco, id_interesse=:id_interesse;"); //pdo ja foi iniciado no conexao.php
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":data_nascimento", $data_nascimento);
		$sql->bindValue(":rel_status", $rel_status);
		$sql->bindValue(":genero", $genero);
		$sql->bindValue(":renda", $renda);
		$sql->bindValue(":id_endereco", $id_endereco);
		$sql->bindValue(":id_interesse", $id_interesse);
		$sql->execute();
		
		unset($falha);
		global $sucesso;
		$sucesso = true;

	} catch (Exception $e) {
		
		unset($sucesso);
		global $falha;
		$falha = true;
	}    
}
?>