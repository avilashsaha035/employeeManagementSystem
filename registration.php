<?php
include('config.php');
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection,"ems");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];

    if ($role === 'admin') {
        $query = "INSERT INTO authentication 
	    values(null,'$_POST[username]','$_POST[email]','$_POST[password]','$_POST[role]')";
	    $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script> alert('Registration Successfull.......You may login'); 
            window.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script> alert('User can't register himself!') </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
				<h1 class="text-dark"> Registration Page </h1>
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
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
					<button type="submit" name="register" class="btn btn-primary"> Register </button>
					<a href="index.php" class="text-success msg"> If You are Registered, Please Login Here </a> 
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