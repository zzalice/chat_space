<?php
//20150117 by zzalice
//Declare
include_once('item.php');

//繼承class DB 的 class message_board
class message_board extends DB{
	var $messages = array();

	function __construct(){
		parent::__construct();	//因 class DB 將東東寫在 construct 裡。destruct則會沿用parent
		$this->receiveMessage();
		$this->loadData();
		$this->showAllMessages();
		$this->showForm();
	}

	function receiveMessage(){
		if(count($_POST) != 0){
			$this->saveData($_POST['userName'], date("Y-m-d h:i:s", time()), $_POST['content']);	
			//"username", "content" are varities
			//"time()" is total time
		}
	}
	function saveData($u, $t, $c){
		$query = "INSERT INTO `all_messages`(`name`, `time`, `content`) VALUE('".$u."', '".$t."', '".$c."');";
		mysql_query($query);
	}
	function loadData(){
		$query = "SELECT * FROM `all_messages`;";
		$result = mysql_query($query);

		//資料庫裡每筆資料用 array 存取
		while($row = mysql_fetch_array($result)){
			
			$temp = new Message($row['name'], $row['time'], $row['content']);
			array_push($this->messages, $temp);
		}
	}
	function showAllMessages(){
		foreach($this->messages as $m){
			$m->show();
		}
	}
	function showForm(){
		echo "<form action='' method='POST'>";	//set to myself. HTML
		echo "Name: "."<input type='text' name='userName'>"."<br>";
		echo "Content: "."<input type='text' name='content'>";
		echo "<input type='submit'>";
		echo "</form>";
	}
}
		$mb = new message_board();
?>