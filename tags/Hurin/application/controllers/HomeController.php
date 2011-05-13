<?php
class HomeController
{
	private $homeModel;
	
	public function __construct()
	{
		$this->homeModel= new Plus4_Home_CrudHome();
	}
	
	public function show()
	{
		$data=$this->homeModel->getContent();
		
		$page = array();
		
		foreach ($data as $key=>$value)
		{
			$page [$value["position"]]["title"]=$value["title"];
			$page [$value["position"]]["value"]=$value["content"];
		}
		
		include_once APPLICATION_PATH.'/views/home/show.php';
	}
}