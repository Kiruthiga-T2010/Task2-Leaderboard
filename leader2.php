<!-- Stage 2 and 3 of task 2-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Leaderboard</title>
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html, 
body {
  height: 100%;
}

body {
  background: linear-gradient(-225deg, #22E1FF 0%, #1D8FE1 48%, #625EB1 100%);
}

.centered {
  top: 50%;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
  position: fixed;
}

.leaderboard {
  width: 800px;
  height: 490px;
  border-radius: 5%;
  box-shadow: 0 8px 40px rgba(0, 0, 0, .3);
  overflow-y: auto;
  overflow-x: hidden;
}

.leaderboard-header div { 
  float: left;
}

.icon {
  height: 100%;
  width: 50%;
  
}

.leaderboard-header:before {
  content: " ";
  width: 20%;
  height: 50%;
  top: 0;
  left: 20px;
  border-radius: 100%;
  border: 30px solid #222;
  background-color: transparent;
  position: absolute;
  opacity: 0.2;
}

.leaderboard-header:after {
  content: " ";
  width: 200PX;
  height: 200PX;
  top: -57%;
  left: -16%;
  border-radius: 100%;
  border: 30px solid #222;
  background-color: transparent;
  position: absolute;
  opacity: 0.2;
}

.title {
  height: 100%;
  width: 50%;
  position: relative;
}

.title h3 {
  color: #FCFCFC;
  text-transform: uppercase;
  font-family: sans-serif;
  text-align: right;
  top: 50%;
  transform: translateY(-50%);
  position: relative;
}


.leaderboard-header {
  top: 0;
  height: 25%;
  width: 100%;
  background-color:#1D8FE1;
  position: absolute;
  padding: 20px 20px 0 20px;
}

.leaderboard-body {
  top: 25%;
  width: 100%;
  height: 75%;
  background-color: #FFFFFF;
  position:absolute;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 9px 3px;
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
  <main>
    <div class="leaderboard centered">
      
      <header class="leaderboard-header">
        <div class="icon">
        <i class="fa fa-users" style="font-size: 70px;color: #002266;"></i>  
        </div>
        <div class="title">
          <h3>Leaderboard</h3>
        </div>
      </header>
      
      <div class="leaderboard-body">
        <div class="row">
		<div class="col-sm-12 col-md-12">
		<table borderless="true" class="table" style="height: 25px;">
		<tbody>
		<?php 
		$conn= new mysqli("localhost","root","","WebD");//connection to the database
		$stm=$conn->query("SELECT * FROM Players ORDER BY points DESC");//getting players from database
		$i=0;
		while($res=$stm->fetch_assoc())
		{$i++;
		?>

		<tr>
		<th class="cardTitle th cardNumber" scope="row"><?php echo $i;?></th>
		<td class="td"><img class="rounded-circle align-self-start mr-3" src="<?php echo $res["img"];?>" alt="Generic placeholde" width="50px" height="50px"></td>
		<td class="td cardTitle"><?php echo $res["name"];?><span class="teamId"> ( ID : <?php echo $res["id"];?> ) </span></td><td class="td"><?php echo $res["points"];?></td>
		</tr>
		<?php
		}
		?>
		</tbody>
		</table>
		</div>
	 </div>
      
    </div>
  </main>
  
</body>
</html>