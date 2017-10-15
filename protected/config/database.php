<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	'connectionString' => 'mysql:host=localhost;dbname=i_pnbp',
	'initSQLs'=>array("set time_zone='+00:00';"), 
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',

	// 'connectionString' => 'mysql:host=localhost;dbname=sinerjit_pnbp',
	// 'initSQLs'=>array("set time_zone='+00:00';"), 
	// 'emulatePrepare' => true,
	// 'username' => 'sinerjit_pnbp',
	// 'password' => 'I3oOOH~0.E*K',
	// 'charset' => 'utf8',

	);