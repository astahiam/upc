<?php
	unset($_SESSION['is_auth']);
	unset($_SESSION['name']);
    session_destroy();
	header("location: /index.php");
?>