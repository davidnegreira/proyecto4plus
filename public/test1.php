<?php
require_once $_SERVER['DOCUMENT_ROOT']."/../application/Bootstrap.php";


$config=new Plus4_Ini_ReadIni($_SERVER['DOCUMENT_ROOT']."/../application/config/settings.ini", "development", true);

//$db=new Plus4_Mysql_Connect($config->sectionConfigs->database);



//$arrResultados=$db->fetchOneArray("SELECT * FROM users");

echo "<pre>";
print_r($config->allConfigs);
echo "</pre>"; 
