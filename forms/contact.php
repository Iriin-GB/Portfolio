
<?php  

$nome     = isset($_POST['name']) ? $_POST['name'] : 'Possível Cliente';
$email    = isset($_POST['email']) ? $_POST['email'] : '';
$assunto  = isset($_POST['subject']) ? $_POST['subject'] : 'Possível Projeto';
$msg      = isset($_POST['message']) ? $_POST['message'] : 'Mensagem Padrão!';

$mensagem 					= '

<p>Nome: '.$nome.' </p>
<p>E-mail: '.$email.'</p>
<p>Assunto: '.$assunto.'</p>
<p>Mensagem: '.$msg.' </p>

'; 

require_once('../phpmailer/src/PHPMailer.php');
require_once('../phpmailer/src/SMTP.php');
require_once('../phpmailer/src/Exception.php');

include_once 'forms/contact.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  // $mail->SMTPSecure = "tls";
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Host = 'smtp.gmail.com';  //  smtp.gmail.com
  $mail->SMTPAuth = true;
  $mail->Username = 'gabrielgbdev@gmail.com'; /* alessandrobarro1988@gmail.com - alessandrobarros@hotmail.com */
  $mail->Password = 'Coc@Cola19'; 

  $mail->Port = 465; /* 465  587*/

  $mail->setFrom('gabrielgbdev@gmail.com'); 
  $mail->addAddress('gabrielgbdev@gmail.com');  /* escolher caixa que vai chegar o email */

	$mail->isHTML(true);
	$mail->Subject = $assunto;
	$mail->Body = $mensagem;
	$mail->AltBody = 'Gabriel Barros';

	if($mail->send()) {
		echo 'email enviado';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>



