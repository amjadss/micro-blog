<?php

	session_set_cookie_params(0, '/~amjad/', 'web.cs.dal.ca');
	session_name('userInfo');
	session_start();


	$email = $_POST['email'];
	$password = $_POST['pass'];	

	if (!isset($_SESSION['user_email'])) {
    	if (isset($_POST['log_in_button'])) {

      		if (!empty($email) && !empty($password)) {

				$query = "SELECT * FROM a3_user_info WHERE email = '$email' AND pass = sha1('$password')";        
        		$result = mysqli_query($link, $query);

        		if (mysqli_num_rows($result) == 1) {

          			$row = mysqli_fetch_array($result);
          			$_SESSION['user_id'] = $row['u_id'];
          			$_SESSION['user_name'] = $row['username'];
          			$_SESSION['user_email'] = $row['email'];
        		}
			}
		
		}
	}	
	if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {	
		
		echo "<h2>Welcome back<p>".$_SESSION['user_name']." !</p></h2>";
		?><ul>	
		<li><a href="profile.php">Profile</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="includes/logout.php">Logout</a></li>
		</ul>
		<?php
	}  
	if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_id'])) {
	?>
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id='log_in_form'>
					<input placeholder="E-mail:" type="text" name="email" id="email" size="30" value=""/><br/>
					<input placeholder="Password:" type="password" name="pass" id="pass" size="30" value="" /><br/>
					<input type="submit" value="log in" name="log_in_button"/><a href="signup.php"> or Sign Up</a></br>	
			</form>
	<?php
	}	
		
?>