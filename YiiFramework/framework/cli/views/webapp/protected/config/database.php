<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=192.169.1.26;dbname=sihci',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '000',
	'charset' => 'utf8',
	
);