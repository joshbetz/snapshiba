<?php
require_once realpath( dirname( __FILE__ ) . '/php-snapchat/snapchat.php' );
require_once realpath( dirname( __FILE__ ) . '/secrets.php' );

class SnapchatUtil {
	public static function add_friend( $username ) {
		$snap = self::login();
		$snap->addFriend( $username );
		$snap->logout();

		return true;
	}

	public static function send_photo( $photo_contents, $usernames, $time = 10 ) {
		$snap = self::login();

		$id = $snap->upload(
			SNAPCHAT::MEDIA_IMAGE,
			$photo_contents
		);

		$snap->send( $id, $usernames, $time );
		$snap->logout();

		return true;
	}

	public static function get_friends_list() {
		$snap = self::login();
		$friends = $snap->getFriends();
		$snap->logout();

		$friends_list = array();

		// turn this into an array like send uses
		foreach ( $friends as $friend ) {
			if ( SNAPCHAT_USERNAME != $friend->name ) // ignore yourself
				$friends_list[] = $friend->name;
		}

		return $friends_list;
	}

	private static function login() {
		$snap = new Snapchat( SNAPCHAT_USERNAME, SNAPCHAT_PASSWORD );
		return $snap;
	}
}