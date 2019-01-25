<?php

	session_set_cookie_params(0, '/~amjad/', 'web.cs.dal.ca');
	session_name('userInfo');
	session_start();


	unset($_SESSION['user_email']);
	setcookie(session_name(), '', time() - 86400);
	session_destroy();


	header ("Location: ../index.php");

?>