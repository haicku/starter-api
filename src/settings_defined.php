<?php
define( 'BASE', realpath(__DIR__ .'/../..') . '/' );
define( 'ROOT', BASE . 'api/v1/' );

define( 'STORE', BASE . 'files/store/' );

define( 'TMP', BASE . 'files/tmp/' );
define( 'TMPUPLOAD', BASE . 'files/tmp/upload/' );
define( 'TPL', BASE . 'files/templates/' );

define( 'DBHOST', 'localhost' );
define( 'DBUSER', 'gpo' );
define( 'DBPASS', 'gpo2016' );
define( 'DBDB', 'gpo' );

define( 'LOG', true );
define( 'LOGDIR', BASE . 'logs/' );
define( 'LOGFILE', LOGDIR . "gpo.log" );

define( 'DEBUG', true );
define( 'DEBUGECHO', false );
?>
