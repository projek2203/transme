<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------


| -------------------------------------------------------------------
*/

$active_group = "default";
$active_record = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => "localhost",
	'username' => "transme-versi2",
	'password' => "2024@versi2",
	'database' => "transme-versi2",
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	//'db_debug' => (ENVIRONMENT !== 'development'),
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
