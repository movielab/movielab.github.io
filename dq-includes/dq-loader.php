<?php
/**
* @author deqila.id
* @copyright 2020
*/
ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
date_default_timezone_set('Asia/Jakarta');
/** Loads the Scripts Environment and Template */
define( 'ABSPATH', $_SERVER['DOCUMENT_ROOT'] . '/' );
define( 'INCPATH', 'dq-includes' . '/' );
define( 'ADMPATH', 'dq-admin' . '/' );
define( 'THMPATH', 'dq-content/themes' . '/' );
if(!include_once(ABSPATH . ADMPATH . 'settings.php')) die("Can't find dq-admin/settings.php");
foreach (glob( ABSPATH . INCPATH . '*.php') as $file ) {
    require_once($file); 
}
include_once( ABSPATH . THMPATH . $options['theme_name'] . '/functions.php' );