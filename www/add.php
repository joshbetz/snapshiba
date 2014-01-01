<?php
$username = $_REQUEST['username'];

if ( ! preg_match( '/^[A-Za-z0-9\.\-\_]+$/', $username ) )
	die( 'failure' );

require '../snapchat.php';
SnaphchatUtil::add_friend( $username );

die( 'success' );