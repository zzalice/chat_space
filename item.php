<?php
// 20150117 by zzalice
//Declare
class Message{
	var $name;
	var $time;
	var $content;

	function __construct($n, $t, $c){
	$this->name = $n;
	$this->time = $t;
	$this->content = $c;
	}
	function show(){
	echo "Name: ".$this->name."<br>";
	echo "Time: ".$this->time."<br>";
	echo "Content: ".$this->content."<br>";
	echo "======================================<br>";
	}
}
class DB{
	var $database = null;
	//connect with db

	function __construct(){
		//connect

		$dbhost = "localhost";	//127.0.0.1
		$accout = "root";	//mysql user
		$password = "";

		$this->database = mysql_connect($dbhost, $accout, $password);
		if($this->database){
			//echo "DB connected.";
		}else{
			//echo "DB connect fail.".mysqli_connect_error();
			//die('DB connect fail'.mysql_error());
		}

		//select db
		$result = mysql_select_db("db_message", $this->database);
		if($result){
			//echo "DB select success.";
		}else{
			//echo "DB select fail.".mysql_error();
		}
	}
	function __destruct(){
		//disconnect
		mysql_close($this->database);
		//disconnect with db
	}
}
//Implement
//$m = new Message("zzalice","2015-01-17","i am zzalice");
//$m->show();

//var_dump($m);

//$db = new DB;	//生成物件
?>