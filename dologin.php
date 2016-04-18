<?php
session_start();
include("config.php");
$username = $_POST["login"];
$password = $_POST["password"];
if(isset($username)){
	if (($username != "") && ($password != ""))
	{
		//connect db
		//$conn = pg_connect("host=localhost port=5432 dbname=land user=postgres password=upc");
		//$conn = pg_connect("host=getenv('OPENSHIFT_POSTGRESQL_DB_HOST') port=getenv('OPENSHIFT_POSTGRESQL_DB_PORT') dbname=upc user=adminclxgqcb password=qCxRkj7LSptv");
		//$conn = pg_connect("host=pellefant-01.db.elephantsql.com port=5432 dbname=gutexjoc user=gutexjoc password=FZbBKtE3H5ZoiCiNICjo3zq9dvPWeU3q")
		$conn = pg_connect("host=$dbhost port=$dbport dbname=$dbAppName user=$dbUsername password=$dbPassword");
		if(!$conn){
			//die('Could not connect: ');
			echo "Could not connect.";
			echo "<script type=\"text/javascript\">alert('Database connection failed.');</script>";
			exit;
		}
		//check user in db
		$rs = pg_query($conn,"select * from public.\"User\" where \"Username\" = '$username' and \"Password\" = '$password' ");
		$row = pg_num_rows($rs);
		
		echo $row;
		if($row != 0){
	
		$_SESSION['is_auth'] = true;
		$_SESSION['name'] = $username;

		
		//redirect to webgis
		header("location: land/index.php");
		}
		else{
	
			$_SESSION['is_auth'] = false;
			echo '<script type="text/javascript">alert("Dear '. $username . ', You are not authorize to use this System. Plese check again the username or password is registered on our database.");</script>';
			header("location: /index.php");
		}
	}
} else {
	echo "<script type=\"text/javascript\">alert('Please type the username or password first.');</script>";
	header("location: /index.php");
}
?>