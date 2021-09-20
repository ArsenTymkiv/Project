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
define( 'DB_NAME', 'blognik' );

/** MySQL database username */
define( 'DB_USER', 'blognik' );

/** MySQL database password */
define( 'DB_PASSWORD', '0Q9TaPPU5OKDif3Q1@' );

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
define( 'AUTH_KEY',         'NH7%sE(JvD)S6]h1zRc*2t].4N;DYP}6FeeYTgk&U`e[pXwN:Cy;o;7(K7QgMsE3' );
define( 'SECURE_AUTH_KEY',  'c+v2|hl(.[B${^CGp9S)TBL&w^&%/usSsJ`^Po)oVbgYz*|.jFS&5a&,U^!QRWQ}' );
define( 'LOGGED_IN_KEY',    'Y75Uy]0WogvhoyEbA.|BqxTwcjinYksI ?9_`s.;./.M0D1Z+_!r[~8QWQwJN_h8' );
define( 'NONCE_KEY',        'Pa.qT tw3LdQxE$wrdtw]f#hE;`KC+]S@PL1UaYP4#jy(8=L^g9Gp^Nw6N-wcIT*' );
define( 'AUTH_SALT',        'wh$Rgp??fii&<=*8@DWI-oB_peJdWduChv/FdqJ!c1T#k$+N=3f]6b>=9Viemo4|' );
define( 'SECURE_AUTH_SALT', 'f2BQ:mexAVqMgbqa>Wi.QF0@!U<Fx=ZK/06.7~+[>cRo>d1(1JZI^w7]88(XwbTp' );
define( 'LOGGED_IN_SALT',   'Lmu27wA:anW2:KD.r/j#oKee;w>HVwH!_Xz]!]ECf_l@|sp%o`!M18oj_^LGeelZ' );
define( 'NONCE_SALT',       '-Omc6c;+!BO!Jarw(d[#;a4qy^UFjR];KYk]ghPpGtd?dE7r;(~s2_T|G,aPfyM=' );

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
define ('CONCATENATE_SCRIPTS', false );
//define('WP_DEBUG_DISPLAY', true);

define('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
