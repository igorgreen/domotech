<?php
 
 
/* 
 
класс DB: коннекст с базой через mysqli

!!!хотел сделать красивым синглтоном, но т.к. mysqli_real_escape_string требует первичный коннект то по собранной мной схеме работы пришлось getDB() вызывать перед каждой функцией работы с базой где используется mysqli_real_escape_string 
 
*/ 
 
 
class DB
{
	private static $db = null;
 
	
	private function __construct(){
		self::$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
		mysqli_set_charset(self::$db, CHARSET);
        mysqli_query(self::$db, "SET NAMES ".CHARSET);
	} 
	
	public static function getDB()
	{
		if(self::$db == null) new DB();   
	}
	 
	
	static function sql($query)
    {
	 	 return mysqli_query(self::$db, $query); 
    }
	
	static function get_users_query($kolonka, $value)//выборка из таблицы юзеров
	{	
		DB::getDB();		 
		$query = DB::sql("SELECT * FROM users WHERE $kolonka='".mysqli_real_escape_string(self::$db,$value)."'");
		
		$res = array();
        while ($row = mysqli_fetch_assoc($query)) 
            $res[] = $row;
	 
		return $res;
	
	}
	
	static function update_user_query($kolonka, $value, $id)//обновление таблицы юзеров
	{	
		DB::getDB(); 		 
		$query = DB::sql("UPDATE users SET $kolonka='".mysqli_real_escape_string(self::$db,$value)."' WHERE id=".mysqli_real_escape_string(self::$db,$id));
		 
	}
 
} 