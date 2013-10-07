<?php
//include the config.php
	include 'includes/config.php';
	
?>
<!DOCTYPE html>

<html>
	<head>
		<title>
			Customer Review Survey System
		</title>
	</head>
	<body style="text-align: center; margin: 0 auto;">
		<div style="padding:20px; border-bottom: 5px black solid; text-align: center;">
			<h1> Customer Review Survey System</h1>	
			</div>
			<a href="index.php" style="padding:0 50px;">Home</a>
<?php
	session_start();
	
	if(isset($_SESSION['username'])){
	$query = "select first_name from tbl_customers where username = '".$_SESSION['username']."'";
	$result = mysql_query($query,$con) or die (mysql_error());
	$row = mysql_fetch_array($result);
	echo "<a href=\"customerReviewPage.php\" style =\"padding:0 50px;\">Customer Review Page</a>";
	echo "<span style =\"padding:0 50px;\"> Welcome {$row['first_name']} </span>" ;

			echo "<a href=\"logout.php\" style =\"padding:0 50px;\">Logout</a><br>";
			
			}
			
	else {
	echo "<a href=\"customerReviewPage.php\" style =\"padding:0 50px;\">Customer Review Page</a>";
	echo "<a href=\"login.php\" style =\"padding:0 50px;\">Login</a>\n";
		
	echo "<a href=\"register.php\" style =\"padding:0 50px;\">Register</a><br>";
	
		}
		
?>
	
		
	</body>
	
</html>