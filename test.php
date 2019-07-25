<?php
class MyDB extends SQLite3{
	function __construct(){
	$this -> open('login.db');
	}

}
$db = new MyDB();
if(!$db){
	echo $db -> lastErrorMsg();
}else{
	echo "DB OPENED";
}
$sql=$db->prepare('SELECT * from logincreds where username=:username');
$username='testadmin';
$sql->bindParam(':username',$username, SQLITE3_TEXT);
$ret=$sql->execute();
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
                $id=$row['id'];
                $user=$row['username'];
                $password=$row['password'];
        }
        if ($id!=""){
		echo $user;
		echo $password;
	}
	$testpasswd='testpassword';
	if($password === md5($testpasswd)){
		echo "okay";
	}
?>
