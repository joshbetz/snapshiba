<?php
require 'snapchat.php';
require 'reddit/corgi.php';

$corgi = file_get_contents( Corgi::fetch_corgi() ) or die();
SnapChatUtil::send_photo( $corgi, SnapchatUtil::get_friends_list() );

exit( 0 );