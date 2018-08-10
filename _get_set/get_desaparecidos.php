<?php
 // Script abaixo pega as informações do formulário para o arquivo set_desaparecidos.php
	if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])){
		$nome = addslashes(ucwords($_POST['nome']));
		$data_desaparecimento = addslashes($_POST['data_desaparecimento']);
		$idade = addslashes($_POST['idade']);
		$visto_por_ultimo = addslashes($_POST['visto_por_ultimo']);
		$status = addslashes($_POST['status']);
		var_dump($visto_por_ultimo);
		die;
	}
?>