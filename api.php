<?php
 
/* 
 
класс api: запуск роутинга и постановка типа данных для выхода 
 
*/
 
class api
{

	static $content;
 
	public function __construct() 
	{ 
	 	new ROUTING();			  
	}	
	
	public function GetContent($query)
	{		
		self::$content = $query; 		
	}
	
    public function PrepareContent()
	{ 

		if($_GET['datetype']=='xml')
		{
  
			header('Content-Type: application/xml;  charset='.CHARSET);
			ob_start();
			echo '<?xml version="1.0" encoding="UTF-8" ?>';			
			echo '<data>';
				foreach( self::$content[0] AS $o=>$a)
				{
					echo "<$o>";
						echo $a;
					echo "</$o>";
				}	
			echo '</data>';
			return ob_get_clean(); 
		
		
		}
		else 
		{	 
			header('Content-Type: application/json;  charset='.CHARSET);
			return json_encode(self::$content);	 
		}
		
	
	  	
	}
 
} 
 
 