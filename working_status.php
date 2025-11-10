<?php
session_start();
include('config.php');
// $conn = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($conn,"ems");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['check_in'])) {
    $username = $_POST['username'];
    $check_in_time = date('Y-m-d H:i:s');

    $sql = "INSERT INTO check_ins (username, check_in_time) VALUES ('$username', '$check_in_time')";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Check-in successful'); 
            window.location.href = 'check_out.php';
            </script>";
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Login</title>
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="resources/css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body>
    <section>
		<div class="row">
        <div class="col-md-2"></div>
			<div class="col-md-8">
        
                <?php
                    $currentDate = date('j F, Y');
                    echo "<h1>".$currentDate."</h1>";
                ?>
                <form method="POST" action="" class="shadow-lg p-5">
                    <div class="form-group">
                        <label> Username: </label>
                        <input type="text" name="username" value="<?php echo $_SESSION['USER_NAME']; ?>" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="check_in" value="Check In" class="btn btn-lg btn-success"> 
                    </div>
                </form>
            <div class="col-md-2"></div>
		</div>
	</section>
    
 


    <!-- JS Link -->
    <script script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="tex/javascript" src="js/bootstratp.min.js"></script>

</body>
</html>