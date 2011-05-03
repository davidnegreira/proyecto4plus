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
		//return $this->db->fetchOneArray("SELECT * FROM users");
		return$this->db->fetchArray("SELECT * FROM posts");
	}
	
	public function __destruct()
	{
		
	}
	
}