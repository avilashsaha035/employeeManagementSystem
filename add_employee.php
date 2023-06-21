<?php
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"ems");

  if(isset($_POST['add'])){
    $query = "INSERT INTO authentication VALUES
    (null,'$_POST[username]','$_POST[email]','$_POST[password]','$_POST[role]')";
    $query_run = mysqli_query( $connection, $query );
    if($query_run){
      echo "<script> alert('Employee Added Successfully'); 
      window.location.href = 'emp_list.php';
      </script>";
    }
    else{
      echo "<script> alert('Something is Wrong'); </script>";
    }
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <!-- CSS Link -->
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body>
    <header>
		<nav class="navbar navbar-expand-lg navbar-primary bg-success">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link text-dark" href="#">Home</a>
					</li>
					</li>
				</ul>
			</div>
		</nav>
    </header>
    <section id="register">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 m-auto-block">
				<h1 class="text-dark"> Add Employee </h1>
				<form action="" method="POST" class="shadow-lg p-5">
					<div class="form-group">
						<label> username: </label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label> Email: </label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label> Password: </label>
						<input type="password" name="password" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-control" name="role">
                            <!-- <option>Select---</option> -->
                            <option value="admin">Owner</option>
                            <option value="user">Employee</option>
                        </select>
                    </div>
					<button type="submit" name="add" class="btn btn-primary"> Add </button> 
				</form>
				<div class="col-md-4"></div>
			</div>
		</div>
	</section>
    
 


    <!-- JS Link -->
    <script script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="tex/javascript" src="js/bootstratp.min.js"></script>

</body>
</html>