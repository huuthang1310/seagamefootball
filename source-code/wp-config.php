<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sgf_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#C8qJ*N< wF%Q`z33hA4})`s@0t(;&GK;R=A< m1AIsQwk)UTcr7eHf5=!w`T+zI' );
define( 'SECURE_AUTH_KEY',  'Q%,wGn6Dhi/(JSe&7_sCxJ^<]@>YkwYz9sP5dTJOVF{1Q9 p^NB!(:xhaI8=y$jk' );
define( 'LOGGED_IN_KEY',    'gKtvtdW$8Tg%@fdQ@<AZo7_od@`tFq~KeE*{mkQjWA}fK!gwIHeeUWQM?,Ut`?2j' );
define( 'NONCE_KEY',        'gk3R-%>nzib_F%s(8Doe?u$yxjT=~+-xjZ$@sYh8@$FIvI3P4+^R,(Sre-sLfBd{' );
define( 'AUTH_SALT',        'N=_ $`8-M_3[n]jO LE#$h<R%m9bl!?KXZ3_k797@9U:0nem7Z^T#r<km_h?NI27' );
define( 'SECURE_AUTH_SALT', 'Ha8Yyu/$FDZgH?~UPEjK&M5:eh#(&XPuXLsB5Za>ex364Q~D2q}wu4/hv:+=BLZ]' );
define( 'LOGGED_IN_SALT',   'fsFaOrM#tIo1$%}GHC~bkn8<P&cE)c!pW9H_QXA0gikc#)dAA#|XQ~|Tu*zmPlzS' );
define( 'NONCE_SALT',       'i,[mp&o7}:y(mE9J$q]X`c|I*acZ;i8a(iev$M |%yFfF8)i51FhZ78md,|~e*Cs' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
