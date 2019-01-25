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
<title>Amjad - Profile</title>
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
					<h2 class="title"><a href="#">Profile </a></h2>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<p><div>
    
    <?php
    
    if (isset($_POST['add_picture_button'])) {
    
				$file_destination = 'uploads/'.$_FILES['picture']['name'];
				
				$upload_path = pathinfo($file_destination);
				
				if (file_exists($file_destination)) {
				
					$counter = 0;
					
					while (file_exists($upload_path['dirname']."/".$upload_path['filename']."_".$counter.".".$upload_path['extension']) ) {
					
						$counter++;
					
					}
					
					$file_destination = $upload_path['dirname']."/".$upload_path['filename']."_".$counter.".".$upload_path['extension'];
				}
	

	
				move_uploaded_file($_FILES['picture']['tmp_name'], $file_destination);
				
				
				chmod($file_destination, 0755);			
				
				$query = "UPDATE a3_user_info SET";
			
				$query .= " avatar = '".mysqli_real_escape_string($link, $file_destination)."'";
				$query .= " WHERE u_id = ".mysqli_real_escape_string($link, $_SESSION['user_id']);
			
				$result = mysqli_query($link, $query);

				header ('Location: profile.php');

						
		}
    

		$query = "SELECT * FROM a3_user_info WHERE u_id = '".$_SESSION['user_id']."'";  
		
		$result = mysqli_query($link, $query);
	
		echo "<table>";
		echo "<td>Name</td>";
		echo "<td>Email</td>";
		echo "<td>Date of reg.</td>";
		while ($row = mysqli_fetch_assoc($result)) {
	
			echo "<tr>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['registration_date']."</td>";
			$image = "<h2><td><img src='".$row['avatar']."' height='180' width='180'/></td></h2>";
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
				<form action="profile.php" method="post" id="add_picture" enctype="multipart/formdata">
					<p>
						File upload doesn't work on Chrome.<br />
						<input type="file" name="picture" id="picture" />
					</p>
					<input type="submit" value="Add New Picture" name="add_picture_button" />
				</form>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<div id="search" >
								<div>
								<?php
									if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {	
		
										echo "<h2>Welcome back<p>".$_SESSION['user_name']." !</p></h2>";
										echo $image;
									}
									?>  
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