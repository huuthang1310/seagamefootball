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
define( 'DB_NAME', 'seagamefootball_db' );

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
define( 'AUTH_KEY',         'C}[4pb13jVJA*PGtY,kXoQF=P0^eND+3&=B7|uC2%x.%!]?0R/u-[_[`4oU&o`qc' );
define( 'SECURE_AUTH_KEY',  'e7X?H3-,/3c~%}?#hR<Y,2Ile6k!5NmJkCaRWu0 1*#S>-+60fn=VcJ[LBl![o@|' );
define( 'LOGGED_IN_KEY',    'Tl=h,wzM5Y0cbJT7agcwJeT[ON6exu[z9Brr9Lixxy2{oPUHUy0)b;ad+:T>BZ:Q' );
define( 'NONCE_KEY',        'my)1&?LGM{6rMdZUpcj!5aF;P12;B}3O~%aF2QZ@R<~l;!D;pp8Xf!12._?3#8eh' );
define( 'AUTH_SALT',        '0YDZs8 O{k]jYREg{!|G5sM29MA>mdvHCtlX<I9P8zIe?<803+KC@OxPL,C[}l?Z' );
define( 'SECURE_AUTH_SALT', '{!Aph?Hz<A=~VM?cxkC8CxkyD&Ut ?NXuBjgyxmA~U72,r8bugYJg#MWbnD$=X]W' );
define( 'LOGGED_IN_SALT',   '3J0?L~2~|n4+|xrvsAa*EW,@~B%Y.a9o`dp&DdcweA@6g*DP%C%].j}ww@i3bzCp' );
define( 'NONCE_SALT',       'aduye>T9vvbU+KBKQ5(n.iP~-{1Fg@|aH05?^+O6AExo;u&BG9wL,TL[.dp<DSfR' );

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
