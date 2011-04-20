<?php
/**
 * MySQL Connection Class
 * 
 * Classe para la lectura de ficheros ini
 * 
 * @copyright Copyright (c) 2011,David Negreira Ríos <br/>
 * Creative Commons: Attribution-Noncommercial-Share Alike 3.0 Unported
 * @version 1.0
 * @author David Negreira Ríos
 * 
 */
class Plus4_Ini_ReadIni
{
	public $allConfigs;
	public $sectionConfigs;
	
	function __construct($path,$section,$asObject)
	{
		$this->allConfigs=$this->parse_ini_file_extended($path,$asObject);
		
		// Si se necesita un objecto y existe la seccion
		if ($asObject && property_exists($this->allConfigs,$section))
			$this->sectionConfigs=$this->allConfigs->$section;
			
		elseif (array_key_exists($section,$this->allConfigs))
			$this->sectionConfigs=$this->allConfigs[$section];
	}
	
	/**
	 * 
	 * Parsea el fichero ini para leer todas las secciones y propiedades
	 * @param string $path ruta del archivo
	 * @param boolean $asObject bandera para establecer si se retorna un objecto
	 */
    private function parse_ini_file_extended($path,$asObject) 
    {
        
    	// Inicicializa una clase vacia
    	$configObj = new stdClass();
    	$configArr = array();
    	
    	// parsea inicialmente el ini como array
    	$settings_ini = parse_ini_file($path, true);
        
        // Para cada elemento del array
    	foreach($settings_ini as $section => $properties)
        {
        	// Divide el nombre de la seccion con su extension
        	if (strpos($section,":"))
            	list($name, $extends) = explode(':', $section);
            else
            {
            	$name=$section;
            	$extends="";
            }

            // obtiene las propiedades de la seccion que hereda
            if(isset($settings_ini[$extends])){
            	// para cada elemento 
                foreach($settings_ini[$extends] as $prop => $val)
                {
                	// si la propiedad tiene subpropiedades
					if (strpos($prop,"."))
					{
						if (!isset($configArr[$name]))
							$configArr[$name]=array();
							
						$nombres=array();
						$nombres = explode('.', $prop);
						$nombres[]=$val;
						$configArr[$name]=$this->arrayToMultiArray($configArr[$name],$nombres);
						//$configArr[$name][$property][$subproperty] = $val;							
					}
					else
					{
	           			$configArr[$name][$prop] = $val;
					}                	
                }
            }
            
            // Establece las propiedades para la seccion actual / sobreescribe en caso de ser necesario
            foreach($properties as $prop => $val)
            {
            	// si la propiedad tiene subpropiedades
				if (strpos($prop,"."))
				{
					if (!isset($configArr[$name]))
						$configArr[$name]=array();
					
					$nombres=array();
					$nombres = explode('.', $prop);
					$nombres[]=$val;
					$configArr[$name]=$this->arrayToMultiArray($configArr[$name],$nombres);
				}
				
				else
				{
					$configArr[$name][$prop] = $val;
				}
            }
        }
        
		//Retorna un array o un objecto
		if ($asObject){
			return $this->arrayToObject($configArr);
		}
		else{
			return $configArr;		
		}        
    }
    
    
    /**
     * 
     * La funcion recibe 2 arrays y crea para $arrayMulti tantas dimensiones como nombres existen en $arrNombres
     * El ultimo elemento de $arrNombres se considera un valor string y no una dimension mas por lo que se asigna al ultimo elemento creado
     * @param array $arrayMulti
     * @param array $arrNombres
     * 
     */
	private function arrayToMultiArray($arrayMulti,$arrNombres)
	{
		
		// Establece el nombre de la clave
		$name=current($arrNombres);

		// Quita el nombre del array de claves pendientes
		array_shift($arrNombres); 

		// Mientras el array de nombres tengas mas claves se ejecuta
		if (count($arrNombres) > 0)
		{
		    //echo "<br>".$name."<br>";
		    //var_dump($arrayMulti);
		    
			// Si este nivel ya es un array
		    if (is_array($arrayMulti))
		    {
		    	// Si la clave no existe la crea
		    	if (!array_key_exists($name, $arrayMulti))
		    		$arrayMulti[$name]=array();

				// Vuelve a llamarse a si misma de forma recursiva		    		
		    	$arrayMulti[$name]=$this->arrayToMultiArray($arrayMulti[$name],$arrNombres);	    		
	
		    	// Retorna el array para este nivel
		   	    return $arrayMulti;
		    }
		    
		    // Si el nivel no es un array lo sobreescribe
		    else 
		    {
		    	$arrayMulti=array();
		    	$arrayMulti[$name]=array();
		    	$arrayMulti[$name]=$this->arrayToMultiArray($arrayMulti[$name],$arrNombres);
		    	
		    	return $arrayMulti;
		    }
		}
		
		else 
			return $name;
	
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param array $array el array que se quieres pasar a objecto
	 */
	private function arrayToObject($array) 
	{
		if(!is_array($array)) {
			return $array;
		}
		
		$object = new stdClass();
		
		if (is_array($array) && count($array) > 0) {
			foreach ($array as $name=>$value) {
				
				if (!empty($name)) {
					$object->$name = $this->arrayToObject($value);
				}
			}
			
			return $object;
		}
		else {
			return FALSE;
		}
	}

}