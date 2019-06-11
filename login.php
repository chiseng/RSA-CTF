
<?php
session_start();
if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
    header("location: admin.php");
        exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	class MyDB extends SQLite3 
	{
		function __construct()
		{
			$this->open('login.db');
									        }
	}
	$db = new MyDB();
	if(!$db){
		echo $db->lastErrorMsg();
	}
	$sql=$db->prepare('SELECT * from logincreds where username=:username');
	$username=$_POST['username'];
	$sql->bindParam(':username',$username, SQLITE3_TEXT);
	$ret=$sql->execute();

	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	       	$id=$row['id'];
		$user=$row['username'];
		$password=$row['password'];
	}
	if ($id!=""){
		if ($password===md5($_POST['password'])){
			$_SESSION["login"]=true;
			$_SESSION["id"]=$id;
			$_SESSION["username"]=$username;
			header('Location: admin.php');
		}else{
		}
		}else{
		}
	$db->close();}

		
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="src/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
      <form method="post" action="login.php">
          <div class="form-group">
            <div class="form-label-group">
		    <input type="text" id="inputEmail" name=username class="form-control" placeholder="Username" required="required" autofocus>
	      <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name=password class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
	  <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
	<div class="text-center">
	<br>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="src/vendor/jquery/jquery.min.js"></script>
  <script src="src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="src/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
