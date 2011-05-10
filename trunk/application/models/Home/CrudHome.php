<?php
class Plus4_Home_CrudHome
{
	private $db;
	private $HOME="home";
	
	public function __construct()
	{
		$this->db = Plus4_Mysql_Connect::getInstance();
	}
	
	public function getContent()
	{
		$result=$this->db->fetchArray("SELECT * FROM content_pages cp INNER JOIN pages p ON cp.page=p.id WHERE p.name='".$this->HOME."'");
		
		if ($result){
			return $result;
		}
		else 
		{
			echo $this->db->getErrorDebug();
			die();
		}
	}
	
	public function __destruct()
	{
		
	}
	
}