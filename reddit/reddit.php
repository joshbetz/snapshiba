<?php
class Reddit {
	private static $user_agent = 'SnapCorgi http://github.com/pcrumm/snapcorgi';

	protected static function make_request($endpoint, $params) {
		$request_url = self::build_request_url( $endpoint ) . '?' . http_build_query( $params );

		$curl = curl_init();
		curl_setopt( $curl, CURLOPT_URL, $request_url );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt( $curl, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $curl, CURLOPT_USERAGENT, self::$user_agent );

		$response = curl_exec( $curl );
		curl_close( $curl );

		return $response;
	}

	private static function build_request_url($endpoint) {
		return 'http://www.reddit.com' . $endpoint . '.json';
	}
}