<?php 
	//database
	$dbhost       = getenv("OPENSHIFT_POSTGRESQL_DB_HOST");
	$dbport       = getenv("OPENSHIFT_POSTGRESQL_DB_PORT");
	$dbUsername = getenv("OPENSHIFT_POSTGRESQL_DB_USERNAME");
	$dbPassword = getenv("OPENSHIFT_POSTGRESQL_DB_PASSWORD");
	$dbAppName  = getenv("OPENSHIFT_APP_NAME");
?>