<?php
/**
 * Application Test Bootstrap
 */

namespace Tests;

use function Mantle\Framework\Testing\tests_add_filter;

$preload_path = '/src/mantle/framework/testing/preload.php';

$mantle_dir = getenv( 'MANTLE_FRAMEWORK_DIR' );
if ( $mantle_dir ) {
	define( 'MANTLE_FRAMEWORK_DIR', $mantle_dir );
} else {
	$mantle_dir = dirname( __DIR__ ) . '/vendor/alleyinteractive/mantle-framework';
	if ( file_exists( $mantle_dir . $preload_path ) ) {
		define( 'MANTLE_FRAMEWORK_DIR', $mantle_dir );
	} else {
		define(
			'MANTLE_FRAMEWORK_DIR',
			preg_replace( '#^(.*?/wp-content/).*$#', '$1private/mantle-framework', __DIR__ )
		);
	}
}

if ( ! file_exists( MANTLE_FRAMEWORK_DIR . $preload_path ) ) {
	echo "ERROR: Unable to find the mantle framework!\n";
	exit( 1 );
}

// Load some features that require early
require_once MANTLE_FRAMEWORK_DIR . $preload_path;

tests_add_filter(
	'muplugins_loaded',
	function () {
		require_once dirname( __DIR__ ) . '/mantle.php';
		require_once MANTLE_FRAMEWORK_DIR . '/src/autoload.php';

		try {
			spl_autoload_register(
				\Mantle\Framework\generate_wp_autoloader( __NAMESPACE__, __DIR__ )
			);
		} catch ( \Exception $e ) {
			\wp_die( $e->getMessage() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
);
try {
	require_once MANTLE_FRAMEWORK_DIR . '/src/mantle/framework/testing/wordpress-bootstrap.php';
} catch ( \Throwable $throwable ) {
	echo "ERROR: Failed to load WordPress!\n";
	echo "{$throwable}\n";
	exit( 1 );
}
