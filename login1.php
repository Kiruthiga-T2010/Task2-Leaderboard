<!-- Stage 4 of task 2; login-->
<!-- username: admin; password: pass;-->
<?php
session_start();
if(isset($_SESSION["comp"]))
	session_unset();
if(isset($_SESSION["log"]))
{
	echo "<script>alert('Please Login first');</script>";
	session_unset();
}
if(isset($_COOKIE["user"]) and isset($_COOKIE["pass"]))
{
$user=$_COOKIE["user"];
$pass=$_COOKIE["pass"];
}
else
	$user=$pass="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Karla|Libre+Barcode+128+Text" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<style>
body {
    padding-top: 90px;
	background-color: mediumseagreen;
	text-align: center;
	color: #686868;
	font-weight: bold;
	
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}
</style>
 <body>
<nav class="navbar navbar-default" style="position: absolute; top: 0px;width:100%; height: 5%;" >
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="logo.png" width="200" height="auto" alt="">
    </div>
    </div>
</nav>
 <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6 col-sm-offset-3">
								<a href="login1.php" class="active" id="login-form-link">Login</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
					<div class="row">
<div class="col-lg-12">
<?php if(isset($_SESSION) and $_SERVER["REQUEST_METHOD"]=="POST")
{$v=false;
if($_POST["user"]=="")
{
	echo "<script>alert('Enter Username');</script>";
}
else if($_POST["pass"]=="")
	   echo "<script>alert('Enter Password');</script>";
else{
$conn= new mysqli("localhost","root","","WebD");
$u=false;
$v=false;
$stm=$conn->query("SELECT * FROM Login");
while($res=$stm->fetch_assoc())
{
if($res["user_id"]===$_POST["user"])
{	$u=true;
   if($res["pass"]===md5($_POST["pass"]))
	{	$v=true;
	    $_SESSION["user"]=$_POST["user"];
		if(isset($_POST["remb"]))
        {
          setcookie("user",$_POST["user"],time()+60*60*24,"/");
          setcookie("pass",$_POST["pass"],time()+60*60*24,"/");	
        }
        else
        {
          setcookie("user","",time()-1,"/");
          setcookie("pass","",time()-1,"/");	
        }	
        break;		
	}
	else
	{
		echo "<script>alert('Incorrect Password');</script>";
		break;
    }

}
}
if(!$u){
	echo "<script>alert('Invalid Username');</script>"."<br>";
    }
}
if($v)
{	header("Location: leader3.php");
$_SESSION["comp"]=true;}
}

?>
</div>
</div>
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="user" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $user;?>">
									</div>
									<div class="form-group">
										<input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $pass;?>">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remb" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>