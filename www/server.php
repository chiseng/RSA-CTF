<?php
session_start();

if (isset($_GET["login"])){
	class MyDB extends SQLite3 
	{
		function __construct()
		{
			$this->open('database.db');
									        }
	}
	$db = new MyDB();
	if(!$db){
		echo $db->lastErrorMsg();
	}
	$sql=$db->prepare('SELECT * from logincreds where username=:username');
	$username=$_POST['username'];
	$sql->bindValue(':username',$username);
	$ret=$db->query($sql);

	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	       	$id=$row['ID'];
		$user=$row["USERNAME"];
		$password=$row['PASSWORD'];
	}
	if ($id!=""){
		if ($password===md5($_POST["password"]){
			$_SESSION["login"]=$username;
			header('Location: index.php');
		}else{
			echo "Incorrect Username or Password";
		}
		}else{
			echo "Incorrect Username or Password";
		}
		$db->close();}
		
?>
