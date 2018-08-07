<?php
//BUSCANDO A CLASSE
require_once 'PHPMailer-master/PHPMailerAutoload.php';
//INICIANDO A CLASSE
class Funcoes{
	//ATRIBUTOS
	private $objmail;
	//CONTRUTOR
	public function __construct(){
		$this->objmail = new PHPMailer();		
	}
	//METODO RESPONSAVEL POR TRATAR OS CARACTERES DOS DADOS
	public function tratarCaracter($vlr, $tipo){
		switch($tipo){
			case 1: $rst = utf8_decode($vlr); break;
			case 2: $rst = htmlentities($vlr, ENT_QUOTES, "ISO-8859-1"); break; 
		}
		return $rst;
	}
	//RESPONSAVEL POR ENVIAR O E-MAIL
	public function enviarEmail($dados){
		
		$this->objmail->IsSMTP();
		$this->objmail->SMTPAuth = true;
		$this->objmail->SMTPSecure = 'tls';
		$this->objmail->Port = 465;
		$this->objmail->Host = 'smtp.mailtrap.io';
		$this->objmail->Username = 'd8604c5b3fdd95';
		$this->objmail->Password = 'af79bf89aaf5cc';
		$this->objmail->ContentType = 'text/html; charset=utf-8';
		$this->objmail->SetFrom($dados['email'], $dados['email']);
		$this->objmail->AddAddress('amigoestouaqui.ml@gmail.com', 'Doar de briquedos para orfanato');
		$this->objmail->Subject = ''.$this->tratarCaracter($dados['assunto'], 1).'';
		
		$html = '<p><strong>Nome:</strong> '.$this->tratarCaracter($dados['nome'], 1).'<br>';
		$html .= $this->tratarCaracter($dados['mensagem'], 1).'</p>';
		
		
		$this->objmail->MsgHTML($html);
		
		if (!$this->objmail->Send()) {
			echo "Mailer Error: " . $this->objmail->ErrorInfo;
		} else {
			global $sucesso;
			$sucesso = true;
		}

	}
}

?>
