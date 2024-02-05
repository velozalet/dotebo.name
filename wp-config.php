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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dotebo_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         '^a,ii`%lIdL>j,OvlJ8N:6Y@-Bu;@w>[L |n^Do<gya_hcTw/+iL37-pq1m{%7/G' );
define( 'SECURE_AUTH_KEY',  'Myfx4tFtfi;kD{E]jG<IJBQ BG{fuT-L!NT=OqnSM]ws2cPibA#@9=G(>2|%(hWq' );
define( 'LOGGED_IN_KEY',    'Ep?_8CajSV#rOnRGnY,wbGUcLi).;f5i?58tSXc_I`V/jj.tK#?47;IkiM]}Yg|+' );
define( 'NONCE_KEY',        '{MQ%$8=U+/]-w(<?a#VTiXKnPc({}a!:2V9,(L_Z~XfFj@=xYzBYl9XX0R7px:Ps' );
define( 'AUTH_SALT',        'cU,bV0^m_00m{/9WMVv.w<.r!%$:+s5%SJK}=hrsx4L;4cXG=S(Lg=3FC[sXEH!D' );
define( 'SECURE_AUTH_SALT', 'n7#i?H9QYY&06#;Ds3Ub6gsgJZN +tfE># v@_[tC`C&}Bnjl@<gO}i_s11%/HcC' );
define( 'LOGGED_IN_SALT',   'J,:}d5T-hD?-LoL(22SY0@tkCyfVw&L|+B]%M*cD6ZT@TechGFLYKU]=r%$*q6U?' );
define( 'NONCE_SALT',       'pI2yhPukyzjGrhyBx5O_MXgRtCvo}@`Y8HbGNu]i X0<{5_UVRlPtv8h}B:zU?m ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

if(is_admin()) {
	add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
	define( 'FS_CHMOD_DIR', 0751 );
}
