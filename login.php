<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/personal.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="jumbotron">
    	<h1 style="text-align:center;color: white;">
    		Payroll System
    	</h1>
    </div>
	<div class="container">
		<div class="row">
			<div class"col-md-4"></div>
			<div class"col-md-4">
				<div class="panel panel-primary loginbox">
					<div class="panel-heading pnle">
						<label class="pnlhdr">Welcome!</label>
					</div>
					<div class="panel-body">
					<?php
					include "config.php";
						if(isset($_POST['username']) && isset($_POST['password'])){
							$username = $_POST['username'];
							$password = md5($_POST['password']);
							$stmt = $db->prepare("SELECT * FROM login WHERE username=? AND password=? ");
							$stmt->bindParam(1, $username);
							$stmt->bindParam(2, $password);
							$stmt->execute();
							$row = $stmt->fetch();
							$user = $row['username'];
							$pass = $row['password'];
							$id = $row['id'];
							$type = $row['type'];
							if($username==$user && $pass==$password){
								session_start();
								$_SESSION['username'] = $user;
								$_SESSION['password'] = $pass;
								$_SESSION['id'] = $id;
								$_SESSION['type'] = $type;
								if($type=='Member'){
								?>
								<script>window.location.href='index.php'</script>
								<?php
								}
								else{
								?>
								<script>window.location.href='admin/index.php'</script>
								<?php
								}
							}
							else{
								?>
								<div class="alert alert-danger alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Maaf!</strong> Password dan username Anda salah, tolong ulangi!.
								</div>
								<?php
							}
						}
					?>
						<form method="post">
							<div class="form-group">
								<h4>Username</h4>
								<input type="text" class="form-control" name="username" />
							</div>
							<div class="form-group">
								<h4>Password</h4>
								<input type="password" class="form-control" name="password" />
							</div>
							<input type="submit" value="Login" class="btn btn-info loginbtn" />
						</form>
					</div>
				</div>
			</div>
			<div class"col-md-4"></div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>