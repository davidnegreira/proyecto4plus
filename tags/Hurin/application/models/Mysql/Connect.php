<?php
/**
 * MySQL Connection Class
 * 
 * Clase de conexion a la base de datos
 * 
 * @copyright Copyright (c) 2011,David Negreira Ríos <br/>
 * Creative Commons: Attribution-Noncommercial-Share Alike 3.0 Unported
 * @version 1.0
 * @author David Negreira Ríos
 * 
 */

class Plus4_Mysql_Connect
{
	private $conexDB;
	private $resultsQuery;
	private $errorMsg;
	private $errorDebug;
	private static $instance=null;
	
	/**
	 * Constructor del objecto
	 * @param configuration $config objecto con todos los parametros de la aplicación
	 */
	private function __construct($config)
	{

		// conexion al servidor
		$this->conexDB = new mysqli($config->server, $config->user, $config->password,$config->db);
		
		// En caso de error se detiene la ejecución
		if (mysqli_connect_error()){
	    	die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		
		// Establece utf8 para la codificacion de caracteres
		$this->conexDB->query("SET NAMES 'utf8'");

		return true;	
	}

	/**
	 * 
	 * Funcion para el inicio de la base de datos
	 * @param configuration $config objecto con todos los parametros de la aplicación
	 */
	public static function init($config)
	{
		self::$instance=new self($config);
	}

	/**
	 * 
	 * Obtiene la instacia de la base de datos (singleton)
	 * @param configuration $config objecto con todos los parametros de la aplicación
	 */
	public static function getInstance($config=null)
	{

		if(!self::$instance && $config != null)
			self::init($config);

		return self::$instance;
			
	}
	
	
	
	/**
	 * @return the $errorMsg
	 */
	public function getErrorMsg() {
		return $this->errorMsg;
	}

	/**
	 * @return the $errorDebug
	 */
	public function getErrorDebug() {
		return $this->errorDebug;
	}

	public function serverInfo()
	{
		/* print server version */
		printf("Server version: %s\n", $this->conexDB->server_info);
	}
	
	/**
	 * Ejecuta consultas
	 * @param string $sql sentencia sql para ejecutar
	 */
 	public function query($sql)
	{
		// Comprueba que existe la conexion
		if (!is_object($this->conexDB)) 
			return false;

		// Ejecuta la query
        $this->resultsQuery=$this->conexDB->query($sql);

        // Si existen errores escribe los mensajes 
		if (!$this->resultsQuery){
            $this->errorMsg='Erro o buscar ou engadir os datos';
            $this->errorDebug=$this->conexDB->error.' '.$sql;
			return false;
		}
        
		return $this->resultsQuery;
	}	
	
	/**
	 * 
	 * Obtiene un único array con la primera fila de resultados
	 * @param string $sql sentencia sql para ejecutar
	 */
	public function fetchOneArray($sql)
	{
		// Si no existen resultados retorna nulo
		if (!($result = $this->query($sql))) {
			return null;
		}
		
		// Carga los resultados
		$arrResult = $result->fetch_assoc();
		
		// Libera el resultset
		$result->close();
		
		return $arrResult;
	}
	
	/**
	 * 
	 * Obtiene un array asociativo con todos los resultados
	 * @param string $sql sentencia sql para ejecutar
	 */
	public function fetchArray($sql)
	{
		// Si no existen resultados retorna nulo
		if (!($result = $this->query($sql))) {
			return null;
		}
		
		// Inicializa la variable
		$arrResult = array();
		
		// Mientras existan resultados
		while ($row = $result->fetch_assoc()) {
				$arrResult[] = $row;
		}
		
		// Libera el resultset
		$result->close();
		
		return $arrResult;
	}
	
	/**
	 * 
	 * Inserta una fila dentro de una tabla determinada
	 * @param string $table nombre de la tabla
	 * @param string $fields nombre de los campos
	 * @param string $values valores para insertar
	 */
	public function insertInto($table,$fields,$values)
	{
		// inicializa variable
		$sets=array();
		
		// Crea la sentencia inicial
		$insertSql='INSERT INTO '.$table.' SET ';
        
		// Escapa los valores para prevenir posibles sql injection
        for($i=0;$i<count($fields);$i++)
			$sets[]=$fields[$i].' = '.$this->quoteEscape($values[$i]); 
           
		// Establece los nombres y valores de los campos 
		$sql= $insertSql . implode( ",", $sets ); 
        
        if (!$this->query($sql)) {
			return false;
		}
        
        return true;
	}
	
	/**
	 * 
	 * Retorna el id usado en la ultima query
	 */
	public function lastId()
	{
		// Comprueba que existe el objecto
		if (!is_object($this->conexDB)) 
			return null;
			
		return $this->conexDB->insert_id;
	}	
	
	/**
	 * 
	 * Añade comillas a los textos y escapa los caracteres especiales
	 * @param string $text la cadena para escapar
	 */
	private function quoteEscape( $text )
	{
		// Comprueba que existe el objecto
		if (!is_object($this->conexDB)) 
			return '';
			
		// Previene que no se hayan escapado caracteres anteriormente
        $text=stripslashes($text);
        
        // Escapa los caracteres y añade comillas
        if (is_string($text))
            return '\''.$this->conexDB->real_escape_string($text).'\'';
        else
            return $this->conexBD->real_escape_string($text);
	}
		
	/**
	 * Destructor del Objecto
	 *
	 */
	public function __destruct()
	{
		// Si se ha creado la conexion
        if (is_object($this->conexDB)) {
            // Si no existen errores
        	if (!$this->conexDB->connect_error){
        		// Cierra la conexion
                $this->conexDB->close();
            }
		}
		return;
	}
	
}