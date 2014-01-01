<?php
require_once realpath( dirname( __FILE__ ) . 'snapchat.php' );
require_once realpath( dirname( __FILE__ ) . 'reddit/corgi.php' );

$corgi = file_get_contents( Corgi::fetch_corgi() ) or die();
SnapchatUtil::send_photo( $corgi, SnapchatUtil::get_friends_list() );

exit( 0 );