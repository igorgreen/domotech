<?php
 
/* 
 
класс ROUTING: просмотр метода запроса, и в зависимости подключения своего экшена
в каждом экшене при наличии параметров идет одновременный запуск модели базы и вставка результата в родительский класс функцию обработки контента
 
*/  
 
 
class ROUTING extends api 
{
 
	public function __construct() 
	{		
		 
		if($_SERVER["REQUEST_METHOD"] == 'GET') 
			$this->get_action($_GET);		
		
		else 
			$this->post_action($_POST);
			
	}
 
	
	private function get_action($params)//экшен работы гет
	{	
	
		if(isset($params['get_users']))
		{		
			 
			if(!empty($params['nick']))
				 parent::GetContent(DB::get_users_query('nick', $params['nick']));
			  
			elseif(!empty($params['login']))
				 parent::GetContent(DB::get_users_query('login', $params['login']));
			  			  
			elseif(!empty($params['email']))
				 parent::GetContent(DB::get_users_query('email', $params['email']));	
				 
			elseif(!empty($params['id']))
				 parent::GetContent(DB::get_users_query('id', $params['id']));			  
		
		}
		
	
	}
	
	
	private function post_action($params)//экшен работы пост
	{
		if(isset($params['update_user']))
		{
			if(!empty($params['nick']) && !empty($params['id']))
				 DB::update_user_query('nick', $params['nick'], $params['id']);
			  
			elseif(!empty($params['email']) && !empty($params['id']))
				 DB::update_user_query('email', $params['email'], $params['id']);	
		
		}
	
	
	}
	
	 
 
} 
 
  