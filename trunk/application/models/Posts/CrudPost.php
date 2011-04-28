<?php
class Plus4_Posts_CrudPost
{
	private $db;
	
	public function __construct()
	{
		$this->db = Plus4_Mysql_Connect::getInstance();
	}
	
	public function getPosts()
	{
		$arrResultados=$this->db->fetchOneArray("SELECT * FROM users");
		
		echo "<pre>";
		print_r($arrResultados);
		echo "</pre>"; 
	}
	
	public function __destruct()
	{
		
	}
	
}