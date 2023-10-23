<?php 
include('./classes/email.php');
	if(isset($_POST['acao'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		$assunto = 'nova mensagem do site';
		$corpo = '';
		foreach ($_POST as $key => $value) {
			$corpo.=ucfirst($key).": ".$value;
			$corpo.="<hr>";
		}

		$info = array('assunto'=>$assunto,'corpo'=>$corpo);
		$mail = new Email($email,'ecaminhamento@rlcakes.com.br','senha_A10',$nome);
		$mail ->addAddress('duarteguilherme290@gmail.com','duarte');
		$mail->formatarEmail($info);		
		if($mail->enviarEmail()){
			echo '<script>alert("penis")</script>';
		}else{
			echo '<script>alert("deu merda man....")</script>';
		}


	}
?>
<div class="contato-container">
	<div class="center">
		<form method="post" action="">
			<input required type="text" name="nome" placeholder="Nome...">
			<div></div>
			<input required type="text" name="email" placeholder="E-mail..">
			<div></div>
			
			<textarea required placeholder="Sua mensagem..." name="mensagem"></textarea>
			<div></div>
			<input type="hidden" name="identificador" value="form_contato" />
			<input type="submit" name="acao" value="Enviar">
		</form>
	</div><!--center-->
</div><!--contato-container-->