<?php
 // Script abaixo pega as informações do formulário para o arquivo set.php
	if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['termos']))	{
		$nome = addslashes(ucwords($_POST['nome']));
		$email = addslashes($_POST['email']);
		$cpf = addslashes($_POST['cpf']);
		$estado = addslashes($_POST['estado']);
		$rel_status = addslashes($_POST['rel_status']);
		$data_nascimento = addslashes($_POST['data_nascimento']);
		$genero = addslashes(ucwords($_POST['genero']));
		$renda = addslashes($_POST['renda']);
		$cep = addslashes($_POST['cep']);
		$estado = addslashes($_POST['estado']);
		$cidade = addslashes($_POST['cidade']);
		$bairro = addslashes($_POST['bairro']);
		$logradouro = addslashes($_POST['logradouro']);
		$numero = addslashes($_POST['numero']);
		$complemento = addslashes($_POST['complemento']);
		$estado_crianca = addslashes($_POST['estado_crianca']);
		$genero_crianca = addslashes($_POST['genero_crianca']);
		$idade = addslashes($_POST['idade']);
	}
?>