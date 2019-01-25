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
<title>Amjad - Homepage</title>
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
					<h2 class="title"><a href="#">Welcome to Simple World </a></h2>
					<p class="meta"><span class="date">January 26, 2012</span><span class="posted">Posted by <a href="#">Someone</a></span></p>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<p>This is <strong>Simple World </strong>, a free, fully standards-compliant CSS template designed by FreeCssTemplates<a href="http://www.nodethirtythree.com/"></a> for <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The photo used in this template is form <a href="http://pdphoto.org/">pdphoto.org</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0</a> license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it :)</p>
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
?>

</body>
</html>
