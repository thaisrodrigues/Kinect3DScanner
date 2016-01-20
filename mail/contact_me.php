<?
/*php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nenhum argumento fornecido";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'thaisrodrigues25rj@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contato site Thais Rodrigues:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: thaisrodrigues25rj@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
*/
?>
<?php
// Incluindo arquivo com a classe Mail
require_once('Mail.php');

if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nenhum argumento fornecido";
	return false;
   }
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
   
// Destinatário da mensagem
$to = "thaisrodrigues25rj@gmail.com";
$from = "nathaliasouzarj@gmail.com";

// Assunto da mensagem
$subject = "Testando envio autenticado pelo Google Apps";

$body = "Você recebeu uma mensagem do site thaisrodrigues.net.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\n\n\nMessage:\n$message";

/* Corpo da mensagem
Em caso de formulário alterar para a variável $_POST['CAMPO'] */

// Servidor do Gmail. Este servidor é padrão.
$host = "ssl://smtp.gmail.com";

/* Email do Gmail que fará o envio autenticado. Digite neste campo o seu e-mail que será responsável pelo envio dos e-mails */
$username = "nathaliasouzarj@gmail.com";

// Sua senha do GMAIL
$password = "33138863";

$headers = array ('From' => $from,
 'To' => $to,
 'Subject' => $subject);

$smtp = Mail::factory('smtp',
 array ('host' => $host,
 'port' => 465, // SMTPS(para mais detalhes ver /etc/services
 'auth' => true,
 'debug' => false, // Debug ligado
 'username' => $username,
 'password' => $password)
 );

// Efetuando o envio autenticado
$mail = $smtp->send($to, $headers, $body);

// Verificando se houve erro
if (PEAR::isError($mail)) {
 echo("Error" . $mail->getMessage());
} else {
 echo("Email enviado com sucesso!!");
}
?>