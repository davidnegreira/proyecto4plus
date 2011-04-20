<?php

/**
 * 
 * Funcion autoload que realiza automaticamente los includes .php al crear un objecto
 * @param string $class nombre de la clase sobre la que se está creando un ojecto
 */
function __autoload($class)
{
	$modelPath=$_SERVER['DOCUMENT_ROOT'].'/../application/models';
	// Ver las clases que se están cargando
	//echo ":".$class;
	$array=explode('_',$class);
	switch($array[0])
	{
		case 'Plus4':
			$path=$modelPath;
		break;
		default:
			$path=$modelPath;
		break;
	}
	unset($array[0]);
	$path.='/'.implode('/',$array);
	$path.='.php';
	include $path;
}








