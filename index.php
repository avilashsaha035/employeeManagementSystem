<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"ems");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];

    if($role === 'user') {
        $query = "SELECT * FROM authentication where username = '$_POST[username]' AND password = '$_POST[password]' AND role = '$_POST[role]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['USER_NAME'] = $_POST['username'];
                echo "<script> 
                window.location.href = 'working_status.php';
                </script>";
            }
        }
        else{
            echo "<script> alert('Please Enter Correct Name and Password'); </script>";
        }
    }
    else {
        echo "<script> 
        window.location.href = 'emp_list.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
				</ul>
			</div>
		</nav>
    </header>
    <section id="login">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 m-auto-block">
				<h1 class="text-dark">Login Page</h1>
				<form action="" method="POST" class="shadow-lg p-5">
					<div class="form-group">
						<label> UserName: </label>
						<input type="text" name="username" class="form-control" required>
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
					<button type="submit" name="login" class="btn btn-primary"> Login </button>
                    <a href="registration.php" class="text-primary msg"> Not Registered Yet! Please Register Here </a> 
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