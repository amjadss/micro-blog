<?php
	session_set_cookie_params(0, '/~amjad/', 'web.cs.dal.ca');
	session_name('userInfo');
	session_start();
?>

<li class="current_page_item"><a href="index.php">Homepage</a></li>
<?php
	if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {	
	?>	
		<li><a href="profile.php">Profile</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="includes/logout.php">Logout</a></li>
	<?php
	}
	elseif (!isset($_SESSION['user_email']) && !isset($_SESSION['user_id'])) {	
	?>	
		<li><a href="signup.php">Signup</a></li>
	<?php
	}

	?>