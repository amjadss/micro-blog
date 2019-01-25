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
<title>Amjad - Members</title>
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
					<h2 class="title"><a href="#">Members </a></h2>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<p><div>
    
    <?php
    
    
    if (isset($_GET['del_id'])) {
				
			
				$query = "SELECT * FROM a3_user_info WHERE u_id = ".mysqli_real_escape_string($link, $_GET['del_id']);
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_assoc($result);
				
				if ($row['avatar'] != 'uploads/default_avatar.jpg'){
				
					unlink($row['avatar']);
				}
			
				$query = "DELETE FROM a3_user_info WHERE u_id = ".mysqli_real_escape_string($link, $_GET['del_id']);

				$result = mysqli_query($link, $query);
				
				header ('Location: members.php');
				
			}

		$query = "SELECT * FROM a3_user_info";  
		
		$result = mysqli_query($link, $query);
	
		echo "<table>";
		echo "<td></td>";
		echo "<td>Name</td>";
		echo "<td>Email</td>";
		echo "<td>Date of reg.</td>";
		echo "<td>Delete</td>";
		while ($row = mysqli_fetch_assoc($result)) {
	
			echo "<tr>";
			echo "<td><a style='text-decoration:none' href='profile.php'><img src='".$row['avatar']."' height='64' width='64'/></a></td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['registration_date']."</td>";

			if(isset($_SESSION['user_id'])) 
			{                   
				 $ut = $_SESSION['user_id']; 
				 $user_id = $row['u_id'];   
						 
				 if(strnatcmp($ut, $user_id)) 
				 { 
						echo "<td><a style='text-decoration:none' href='members.php?del_id=".$row['u_id']."' title='Delete this user'><img src='images/delete.png' alt='( X )' height='20' width='20'/></a></td>";
				 } 
			} 
	
			echo "</tr>";
		}
		echo "</table>";
		?>

    
    
    
    
</div>
			
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
									<?php include('includes/login.php'); ?>
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
	
	if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_id'])) {	
		
		header ("Location: index.php");
	}   
	
?>

</body>
</html>