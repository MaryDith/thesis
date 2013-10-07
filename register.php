<?php 
include 'includes/config.php';


# if there the button SUBMIT is click from the form REGISTER
if(isset($_POST['submit'])){
#pang TESTING lang ung echo na to :D
	echo "testing kapag na pindot na";

//getting the data from the form REGISTER

$fname = $_POST['firstname'];
$lname = ($_POST['lastname']);
$email = ($_POST['email']);
$phone = ($_POST['phone_number']);
$username = ($_POST['username']);
$password = ($_POST['password']);
$cpassword = ($_POST['cpassword']);

//Check if field were MISSING


foreach($_POST as $key=>$value) {
if(empty($_POST[$key])) {
$message = ucwords($key) . " field is required";
break;}}

if($password !== $cpassword){
$message = "Password did not match";
}

if(!isset($message)) {
//query for adding/insert new Customer Data
$add_new_user = (mysql_query("insert into users set id='',
 
 first_name = '".$fname."',
 last_name = '".$lname."',
 email = '".$email."', 
 phone = '".$phone."', 
 username = '".$username."', 
 password = '".$password."'",$con) or die (mysql_error()));

//the query $add_new_user is SUCCESS then
if($add_new_user){
echo header("location:index.html");
//or else 
}else{echo "Something went wrong in Adding New User";}

$message = "You have registered successfully!";	

unset($_POST);
}

}
else{
echo "hinde pa napipindot";

}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="themes/theme.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	</head>
	<body>
	<div data-role="page" >
		
			<div data-role="header" data-position="inline">
			
			<a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
			
				<h1>SEUNGLEE</h1>
			</div>
		
	
	
		<form name="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

			<h1> Registration Form  </h1>
		
				<br/>
				<center><?php if(isset($message)) echo $message; ?></center>
				<br/>
				
				
				<label>First Name</label><br>
					<input placeholder="FirstName" type="text" name="firstname" value="<?php if(isset($_POST['submit'])) echo $fname;?>" /><br>
				<label>Last Name:</label><br>
					<input placeholder="Last Name" type="text" name="lastname"  value="<?php if(isset($_POST['submit'])) echo $lname;?>" /><br>
				<label>Email:</label><br>
					<input placeholder="email@example.com" type="email"name="email"  value="<?php if(isset($_POST['submit'])) echo $email;?>" /><br>
				<label>Phone number:</label><br>
					<input placeholder="digit number" type="text" name="phone_number"  value="<?php if(isset($_POST['submit'])) echo $phone;?>" /><br>
				<label>Username:</label><br>
					<input placeholder="Desire Username" type="text" name="username"   value="<?php if(isset($_POST['submit'])) echo $username;?>"/><br>
				<label>Password:</label><br>
					<input placeholder="Desire Password" type="password"name="password" /><br>
				<label>Confirm Password:</label><br>
					<input placeholder="Confirm Password" type="password" name="cpassword"/><br>
				
				<input type="submit" name="submit" value="submit"/>
		</form>
		<div data-role="footer" data-theme="a" data-position="fixed"> 
				<h4></h4> 
			</div> 
	</div>
	</body>
	
</html>

