<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
  <body>
	
	<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li><a href="#">Karyawan</a></li>
		<?php
			if($_SESSION['type']=='Administrator'){
		?>
		<li><a href="#">Laporan</a></li>
		<?php
		}
		else{
		?>
		<li><a href="#">Profile</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
		<?php
		}
		?>
      </ul>
	  <?php
		if($_SESSION['type']=='Member'){
	  ?>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
	  <?php
		}
	  ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
	  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
  
    <div class="container-fluid">
		  <div class="row">
        <div class="col-sm-3 sidenav">
            <h4>Menu</h4>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#section1">Input</a></li>
              <?php
                if($_SESSION['type']=='Administrator'){
                ?>
                <li><a href="#">Delete</a></li>
                <?php
                }
                else{
                ?>
                <li><a href="#">Update</a></li>
                <?php
                }
                ?>
              <li><a href="../logout.php">Logout</a></li>
            </ul><br>
        </div>
			    <!--<div class="col-sm-3">
						 <div class="list-group">
        			  <a href="#" class="list-group-item">Input</a>
        			  <?php
        				if($_SESSION['type']=='Administrator'){
        			  ?>
        			  <a href="#" class="list-group-item">Deletez</a>
        			  <?php
        			  }
        			  else{
        			  ?>
        			  <a href="#" class="list-group-item">Update</a>
        			  <?php
        			  }
        			  ?>
        			  <a href="../logout.php" class="list-group-item">Logout</a>
			        </div>
			    </div>!-->
			<div class="col-sm-9">
			
			<div class="jumbotron">
			  <h1>Hello, <?php echo $_SESSION['type'] ?></h1>
			  <p><h2>Detail Fitur</h2></p>
			  <p><a class="btn btn-primary btn-lg" href="#" role="button">Go</a></p>
			</div>
			
			</div>
		</div>
	  </div>

    <footer class="container-fluid">
      <p>Footer Text</p>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>