<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Report</title>
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="row">
    <div class="container table-responsive-md">
		<table class="table">
        <thead>
			<tr class="table-active">
                <th scope="col">Date</th>
				<th scope="col">Check in</th>
				<th scope="col">Check Out</th>
				<th scope="col">Office Hour</th>
			</tr>
			</thead>
			<tbody>
				<?php
                session_start();
                    include('config.php');
					// $connection = mysqli_connect("localhost","root","");
					// $db = mysqli_select_db($connection,"ems");
                    $user_name = $_SESSION['USER_NAME'];
					$query = "select * from check_ins where username='$user_name' ORDER BY `id` ASC ";
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						?>
                        <div>
                            <?php 
                                echo "User Name:". " " . $row['username'];
                            ?> 
                        </div>
						<tr class="table-active">
							<!-- <td class="list"> <?php echo $row['username'] ?> </td> -->
                            <td class="list">
                                <?php 
                                    $checkInTime =  new DateTime($row['check_in_time']);
                                    echo  $checkInTime->format('d-m-Y');
                                ?>
                            </td>
                            <td class="list">
                                <?php 
                                    $checkInTime =  new DateTime($row['check_in_time']);
                                    echo  $checkInTime->format('H:i');
                                ?>
                            </td>
                            <td class="list">
                                <?php 
                                    $checkOutTime = new DateTime($row['check_out_time']);
                                    echo  $checkOutTime->format('H:i');
                                ?>
                            </td>
                            <td class="list">
                                <?php 
                                    $duration =  $checkInTime->diff($checkOutTime);
                                    echo  $duration->format('%H')." "."Hours";
                                ?>
                            </td>
						</tr>
				<?php
				    }
				?>
			</tbody>
		</table>
    </div>
    </div>
    

    <!-- JS Link -->
    <script script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="tex/javascript" src="js/bootstratp.min.js"></script>

</body>
</html>
