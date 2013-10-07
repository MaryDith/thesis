<?php 
include 'config.php';


# if there the button SUBMIT is click from the form REGISTER
if(isset($_POST['submit'])){
#pang TESTING lang ung echo na to :D
	

//getting the data from the form REGISTER

$fname = $_POST['firstname'];
$lname = ($_POST['lastname']);
$email = ($_POST['email']);
$phone = ($_POST['phone_number']);


//Check if field were MISSING


foreach($_POST as $key=>$value) {
if(empty($_POST[$key])) {
$message = ucwords($key) . " field is required";
break;}}



if(!isset($message)) {
//query for adding/insert new Customer Data
$add_new = (mysql_query("insert into tbl_customers set customer_id='',
 
 first_name = '".$fname."',
 last_name = '".$lname."',
 email = '".$email."', 
 phone = '".$phone."'",$con) or die (mysql_error()));

//the query $add_new is SUCCESS then
if($add_new){
echo header("location:index.php");
//or else 
}else{echo "Something went wrong in Adding New User";}



unset($_POST);
}

}
else{


}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>Seung Lee</title>

			<link rel="stylesheet" href="themes/purple2.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

		<!--- Javascript ng Slider--->
		<script type="text/javascript">

				function theRotator() {
					//Set the opacity of all images to 0
					$('div.rotator ul li').css({opacity: 0.0});
					
					//Get the first image and display it (gets set to full opacity)
					$('div.rotator ul li:first').css({opacity: 1.0});
						
					//Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds
					
					setInterval('rotate()',6000);
					
				}

				function rotate() {	
					//Get the first image
					var current = ($('div.rotator ul li.show')?  $('div.rotator ul li.show') : $('div.rotator ul li:first'));

					if ( current.length == 0 ) current = $('div.rotator ul li:first');

					//Get next image, when it reaches the end, rotate it back to the first image
					var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div.rotator ul li:first') :current.next()) : $('div.rotator ul li:first'));
					
					//Un-comment the 3 lines below to get the images in random order
					
					//var sibs = current.siblings();
					//var rndNum = Math.floor(Math.random() * sibs.length );
					//var next = $( sibs[ rndNum ] );
							

					//Set the fade in effect for the next image, the show class has higher z-index
					next.css({opacity: 0.0})
					.addClass('show')
					.animate({opacity: 1.0}, 1000);

					//Hide the current image
					current.animate({opacity: 0.0}, 1000)
					.removeClass('show');
					
				};


				$(document).ready(function() {		
					//Load the slideshow
					theRotator();
					$('div.rotator').fadeIn(1000);
					$('div.rotator ul li').fadeIn(1000); // tweek for IE
				});
		</script>
	


<script src="js/BlackBerry-JQM-all.js"></script>
	<link rel="stylesheet" href="css/BlackBerry-JQM-all.css" />



	</head>
	<body>
	<img src="../images/header.jpg"></img>
	
		<form name="register" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		
			<h1> Reservation Form  </h1>
		
				<br/><br/><br/><br/><br/>
				<center><?php if(isset($message)) echo $message; ?></center>
				
				
				
				
				
				<label>First Name:</label><br>
					<input placeholder="FirstName" type="text" name="firstname" value="<?php if(isset($_POST['submit'])) echo $fname;?>" /><br>
				<label>Last Name:</label><br>
					<input placeholder="Last Name" type="text" name="lastname"  value="<?php if(isset($_POST['submit'])) echo $lname;?>" /><br>
				<label>Email:</label><br>
					<input placeholder="email@example.com" type="email"name="email"  value="<?php if(isset($_POST['submit'])) echo $email;?>" /><br>
				<label>Phone number:</label><br>
					<input placeholder="digit number" type="text" name="phone_number"  value="<?php if(isset($_POST['submit'])) echo $phone;?>" /><br>
				
				
				<input type="submit" name="submit" value="submit"/>
					
		</form>
		
				
		
	
	</body>
	
</html>

