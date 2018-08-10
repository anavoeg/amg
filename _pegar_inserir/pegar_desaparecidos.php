<?php
 // Script abaixo pega as informações do formulário para o arquivo inserir_desaparecidos.php
	if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])){
        $arquivo = $_FILES["arquivo"];
		$nome = addslashes(ucwords($_POST['nome']));
		$data_desaparecimento = addslashes($_POST['data_desaparecimento']);
		$idade = addslashes($_POST['idade']);
		$recompensa = addslashes($_POST['recompensa']);
		$visto_por_ultimo = addslashes($_POST['visto_por_ultimo']);
		$status = isset($_POST['status'])?1:0;
	}
?>