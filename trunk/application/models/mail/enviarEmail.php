<?php
class Acl_mail_enviarEmail{
	

				   function __construct($email,$description,$name,$archivo,$tema){
				   		set_time_limit(60);
					    $mail = new Acl_mail_PHPMailer();
					    $mail->SMTPDebug = false;
					    $mail->IsSMTP();
					    $mail->SMTPAuth   = true;                  // enable SMTP authentication
					    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
					    $mail->Host       = "smtp.googlemail.com";      // sets GMAIL as the SMTP server
					    $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
					    $mail->Username   = 'gruposvn2011@gmail.com';  // GMAIL username
					    $mail->Password   = 'vigocapital';            // GMAIL password
					    $mail->AddReplyTo('gruposvn2011@gmail.com', 'argucias');
					    $mail->From       = 'gruposvn2011@gmail.com';
					    $mail->FromName   = 'argucias';
					    $mail->Subject    = $tema;
					    $mail->AltBody    = "Para ver este mensaje por favor utiliza un cliente de correo electrónico compatible con HTML."; // optional, comment out and test
					    $mail->WordWrap   = 50; // set word wrap
					    $mail->MsgHTML($description);
					    $mail->AddAddress($email, $name);
					    $varname = $archivo['name'];
						$vartemp = $archivo['tmp_name'];	
						$mail->AddAttachment($vartemp, $varname);
					    
					    $mail->IsHTML(true); // send as HTML
					    print_r($mail);
					    $enviado = $mail->Send();
					
					    if($enviado)
					        echo  "Notificar al usuario que el mail se envio correctamente";
					    else
					        echo  "Notificar al usuario que no se pudo enviar el mail";
				        die;
				   }
}