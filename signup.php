<?php
	require_once('includes/config.php');
	
	session_set_cookie_params(0, '/~amjad/', 'web.cs.dal.ca');
	session_name('userInfo');
	session_start();
	 
	$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die('Your DB connection is misconfigured. Enter the correct values and try again.');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
		//	This is a free CSS template that i got from
		//	http://www.freecsstemplates.org/preview/simpleworld/
	
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Simple World 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20111225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Author" content="Amjad Sulaimani" />
<meta name="description" content="Assignment 3" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Amjad - Sign Up</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Marvel|Delius+Unicase' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="index.php">Amjad's <span> site</span></a></h1>
			</div>
			<div id="menu">
				<ul>
					<?php include('includes/menu.php'); ?>
				</ul>
			</div>
		</div>
		<!-- end #header -->
		<div id="page">
			<div id="content">

				<div class="post">
					<h2 class="title"><a href="#">Sign Up form </a></h2>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<p><?php
					$username	= $_POST['username'];
					$email 		= $_POST['email'];
					
					$shuffled 	= str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
					$pass 		= substr($shuffled,0,8);
					
					$from 		= 'amjad.ss@hotmail.com';
           			$subject 	= 'Amjad\'s Site - login information.';    
            		$msg 		= "This is the login information for: $username\n"."Login ID: $email\n"."Password: $pass\n";
					
					$bool_username = false;
					$bool_email = false;
			
					if (isset($_POST['signup_button'])) {
			
						if (isset($username) && $username != '') {
		
							$bool_username = true;
						}
						if (isset($email) && $email != '') {
		
							$bool_email = true;
						}
						if (isset($username) && $bool_username && ($email) && $email) {
						
							mail($email, $subject, $msg, 'From:'.$from);
							?>
							<div>
							<?php
							echo "Thanks: ".htmlspecialchars($username)." </br>";
							echo "A message has been sent to this email (".htmlspecialchars($email).") with your login information.</br>";
							echo "You will be redirected shortly";
							?>
							</div>
							<?php
							$query = "INSERT INTO a3_user_info (username, email, pass) VALUES (";
							$query .= "'".mysqli_real_escape_string($link, $username)."',";
							$query .= "'".mysqli_real_escape_string($link, $email)."',";
							$query .= "'".mysqli_real_escape_string($link, sha1($pass))."'";
							$query .= ")";
			
							$result = mysqli_query($link, $query);
							header ("refresh: 8; index.php");
						}
					} 
					?>
						<form action="signup.php" method="post" id='checkout'>
							<div>
								<h3>Please fill this form to sign up</h3>
								
								<div  <?php if (isset($username) && !$bool_username)
									echo "style='border: 3px dotted #DC143C;''border-style:dotted'" ?>>
						
									<input placeholder="Full name:" type="text" name="username" id="username" size="51" value="<?php
										if (isset($username)) {
											echo $username;
										}
									?>"/><?php if (isset($username) && !$bool_username) echo "<validation> (NOT validated)</validation>"?>
								</div>
								
								<div  <?php if (isset($email) && !$bool_email)
									echo "style='border: 3px dotted #DC143C;''border-style:dotted'" ?>>
						
									<input placeholder="E-mail:" type="text" name="email" id="email" size="51" value="<?php
										if (isset($email)) {
											echo $email;
										}
									?>"/><?php if (isset($email) && !$bool_email) echo "<validation> (NOT validated)</validation>"?>
								</div>

								<div>
									<input type="submit" value="Signup" name="signup_button"/>
								</div>    
							</div>
						</form>
			
			<?php	
			#
			# CLOSE MYSQL CONNECTION
			#
			mysqli_close($link);
			?>  </p>
					</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<div id="search" >
								<div>
									<?php //include('includes/login.php'); ?>
								</div>
						</div>
						<div style="clear: both;">&nbsp;</div>
					</li>
				</ul>
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page -->
		<div id="footer">
			<p>Copyright (c) 2012 Amjad Sulaimani - B00525977. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
		</div>
	</div>
</div>
<!-- end #footer -->


<?php
	mysqli_close($link);
	
	if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {	
		
		header ("Location: index.php");
	}   
	
?>

</body>
</html>