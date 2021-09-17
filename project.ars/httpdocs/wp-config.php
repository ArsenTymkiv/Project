<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project.ars' );

/** MySQL database username */
define( 'DB_USER', 'project.ars' );

/** MySQL database password */
define( 'DB_PASSWORD', 'UnvOP7V7LhtGSPPK1@' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '23F,&ilw,X%nw~m()S$z-n3wn@C&%H4^iyTlnsWl>1.=c%P:(#&@PB1dK6.vQ3b%' );
define( 'SECURE_AUTH_KEY',  '34oh|cLmzt@:uH=@?;j]fWsg{<Wn+=#MfnY,P2-XC12.P;nJ<z^7 xNHn>O2|{uZ' );
define( 'LOGGED_IN_KEY',    'tOda_cy$hFO[4RE,$h`R,WLZC(,M[y~8BJ=BQ1%loyW@HsTgMCE-($pz[]e[wK$X' );
define( 'NONCE_KEY',        'hh^j3V`qz,vo];n]b>ZOaQo78}t.ei>Z2Is6!hMav1F2B7? ZQPaT|}E]S|{~AG)' );
define( 'AUTH_SALT',        'fa#l*_)OC^K/NCkeJAtp:,x3L~ycs6=|/S!Qjk@{=s0&=Zr)3N]]OnmXpO^~Dzp_' );
define( 'SECURE_AUTH_SALT', 'L$vE0G76G+o;~5cKCJg9$pE!rC^( qv+;]nzBj1RiO2I$nY{&p6N?P70lH_fbh((' );
define( 'LOGGED_IN_SALT',   '1qj-zA:n7g`x6Q)!s+NSVyO-H%~VrScG:V#2g;Wy5Vs}?tf7>@EUBd&jB;BsYCZN' );
define( 'NONCE_SALT',       '!Vb3y@@>Wy-0*/j.&bMy?c|1mOL:0>W~}iZ?,R,i$~^;G<3m0kuze)(pMdco.rox' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('FS_METHOD', 'direct');

define('WP_DEBUG', true);

define ('CONCATENATE_SCRIPTS', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
