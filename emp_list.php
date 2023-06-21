<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
</head>
<body class="container">
    <div class="container table-responsive-md">
        <a href="add_employee.php" class="btn btn-ex-lg btn-primary mb-3 float-right">Add Employee</a>
		<table class="table">
			<tbody>
				<?php
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"ems");
					$query = "select * from authentication WHERE role='user' ORDER BY `ID` ASC ";
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						?>
						<tr class="table-active">
							<td class="list"><?php echo $row['username'] ?></td>
						</tr>
				<?php
				    }
				?>
			</tbody>
		</table>
		<a href="employee_report.php" class="btn btn-ex-lg btn-primary mb-3 float-left">Employee Report</a>
    </div>

    <!-- JS Link -->
    <script script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="tex/javascript" src="js/bootstratp.min.js"></script>

</body>
</html>