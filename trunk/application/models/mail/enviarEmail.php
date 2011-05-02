<?php
class Acl_mail_enviarEmail extends Acl_mail_abstractPHPMailer{
	

				   function __construct($email,$description,$name,$archivo,$tema){
				   		set_time_limit(60);
					    
					    $this->SMTPDebug = false;
					    $this->IsSMTP();
					    $this->SMTPAuth   = true;                  // enable SMTP authentication
					    $this->SMTPSecure = "ssl";                 // sets the prefix to the servier
					    $this->Host       = "smtp.googlemail.com";      // sets GMAIL as the SMTP server
					    $this->Port       = 465;                   // set the SMTP port for the GMAIL server
					    $this->Username   = 'gruposvn2011';  // GMAIL username
					    $this->Password   = 'vigocapital';            // GMAIL password
					    $this->AddReplyTo('gruposvn2011', 'argucias');
					    $this->From       = 'gruposvn2011@gmail.com';
					    $this->FromName   = 'argucias';
					    $this->Subject    = $tema;
					    $this->AltBody    = "Para ver este mensaje por favor utiliza un cliente de correo electrónico compatible con HTML."; // optional, comment out and test
					    $this->WordWrap   = 50; // set word wrap
					    $this->MsgHTML($description);
					    $this->AddAddress($email, $name);
					    $varname = $archivo['name'];
						$vartemp = $archivo['tmp_name'];	
						$this->AddAttachment($vartemp, $varname);
					    
					    $this->IsHTML(true); // send as HTML
					    print_r($this);
					    $enviado = $this->Send();
					
					    if($enviado)
					        echo  "Notificar al usuario que el mail se envio correctamente";
					    else
					        echo  "Notificar al usuario que no se pudo enviar el mail";
				        die;
				   }
}