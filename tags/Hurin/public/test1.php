<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../application/Bootstrap.php";

$boot=new Bootstrap();

$email=new Acl_mail_enviarEmail("rasielmaster@yahoo.es", "prueba de mensaje", "nombre", null, "prueba de mensaje");

//echo "<pre>";
//print_r($config->allConfigs);
//echo "</pre>"; 

