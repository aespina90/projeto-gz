<?php
header("Location: ../contato.php");
/*apenas dispara o envio da mensagem caso houver/existir $_POST['enviar']*/
if (isset($_POST['enviar']))

{
/* #### ALTERE OS CAMPOS ENTRE ASPAS SIMPLES DESTACADOS ABAIXO #### */

/* ## CAMPO 1 ## Informe o e-mail que receberá o formulário */
$destinatarios = 'contato@olariairmaosspina.com.br';

/* ## CAMPO 2 ## Informe o nome que será exibido no e-mail do formulário */
$nomeDestinatario = 'Olaria Irmãos Spina';

/* ## CAMPO 3 ## Informe o endereço de e-mail completo criado em sua hospedagem, que será o remetente da mensagem. Como por exemplo teste@seudominio */
$usuario = 'site@olariairmaosspina.com.br';

/* ## CAMPO 4 ## Informe a senha do endereço de e-mail acima */
$senha = 'olaria@2014';



/*abaixo as veriaveis principais, que devem conter em seu formulario*/
$nomeRemetente = $_POST['nomeRemetente'];
$assunto = $_POST['assunto'];
$_POST['mensagem'] = nl2br('Nome: '. $_POST['nome'] ."
". $_POST['empresa'] ."
". $_POST['telcomercial'] ."
". $_POST['celular'] ."
". $_POST['email'] ."
". $_POST['assunto'] ."
". $_POST['mensagem']);



/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

include_once("class.phpmailer.php");

$To = $destinatarios;
$Subject = $assunto;
$Message = $_POST['mensagem'];

$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
$Username = $usuario;
$Password = $senha;
$Port = "587";

$mail = new PHPMailer();
$body = $Message;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $nomeDestinatario);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To, "");

if(!$mail->Send()) {
$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
} else {
$mensagemRetorno = 'E-mail enviado com sucesso!';
}
}
?>