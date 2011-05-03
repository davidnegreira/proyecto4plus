<?php
class PostController
{
	public function selectPosts()
	{
		$posts=new Plus4_Posts_CrudPost();
		$data=$posts->getPosts();
		include_once APPLICATION_PATH.'/views/posts/select.php';
	}
}