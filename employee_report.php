<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn,"ems");


// get our past 7 days from current-date
$sql = "SELECT DISTINCT DATE(check_in_time) AS check_in_date FROM check_ins";
$result = $conn->query($sql);
$dates = array();
for ($i = 7; $i > 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $dates[] = $date;
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['check_in_date'];
    }
}

$selected_date = isset($_POST['selected_date']) ? $_POST['selected_date'] : date('Y-m-d');

?>


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
        <div class="form-group">    
            <form method="POST" action="">
                <select name="selected_date">
                    <?php foreach ($dates as $date) : ?>
                        <option value="<?php echo $date; ?>" <?php if ($selected_date === $date) echo 'selected'; ?>>
                            <?php echo $date; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="btn btn-sm btn-primary" value="Get Employee Details">
            </form>
        </div>

		<table class="table">
        <thead>
			<tr class="table-active">
				<th scope="col">User name</th>
                <th scope="col">Date</th>
				<th scope="col">Check in</th>
				<th scope="col">Check Out</th>
				<th scope="col">Office Hour</th>
			</tr>
			</thead>
			<tbody>
				<?php
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"ems");
					$query = "select * from check_ins WHERE DATE(check_in_time) = '$selected_date' ORDER BY `id` ASC ";
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						?>
						<tr class="table-active">
							<td class="list"> <a href="individual_emp_report.php" class="text-dark"><?php echo $row['username'] ?></a></td>
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
