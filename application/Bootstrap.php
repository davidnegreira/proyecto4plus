<?php

/**
 * 
 * Clase encargada de poner en funcionamiento todo el sitio web
 * 
 * @copyright Copyright (c) 2011,David Negreira Ríos <br/>
 * Creative Commons: Attribution-Noncommercial-Share Alike 3.0 Unported
 * @version 1.0
 * @author David Negreira Ríos
 * 
 */

class Bootstrap
{
	public function __construct()
	{
		// Se registra la funcion que funcionará como autoload
		spl_autoload_register(array($this, 'autoload'));
	}

	/**
	 * 
	 * Funcion autoload que realiza automaticamente los includes .php al crear un objecto
	 * @param string $class nombre de la clase sobre la que se está creando un ojecto
	 */
	private function autoload($class)
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

	public function run()
	{
		$config=new Plus4_Ini_ReadIni(APPLICATION_PATH."/config/settings.ini", "development", true);
		
		// Inicializa la conexion a la base de datos
		Plus4_Mysql_Connect::init($config->sectionConfigs->database);
		
		// Controller
		include_once APPLICATION_PATH.'/controllers/PostController.php';
		
		$controller=new PostController();

		ob_start();
		$controller->selectPosts();
		$content=ob_get_contents();
		ob_end_clean();	

		// Carga el layout
		include_once APPLICATION_PATH."/layouts/layout.php";
	}
}
