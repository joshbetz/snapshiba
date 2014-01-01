$(document).ready( function() {
	$( '#corgi-signup' ).click( function() {
		username = $( '#snap-name' ).val();

		if (! validate( username )) {
			$( '#signup-failure' ).show( 'slow' );
		}
		else {
			$( '#signup-failure' ).hide( 'slow' );
			$( '#signup-form' ).hide( 'slow' );

			$.ajax( { url: 'http://snapcorgi.com/add.php?username=' + username } ).done( function() {
				$( '#signed-up' ).show( 'slow' );;
			} );
		}
	} );
} );

function validate( str ) {
	var regex = /^[A-Za-z0-9\.\-\_]+$/;
	return regex.test( str );
}