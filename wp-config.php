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
define( 'DB_NAME', 'gowithfund' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '[_W7u>_L93KJWvN/q1$shP@YZ|:_HK.%5d}r.ZVSl/0~_XCLJ452$LGSY,zb0Bae' );
define( 'SECURE_AUTH_KEY',  'LRZz4$A(1<>8]}k4;h4HW(j*OI:j!TH_$VtwlKfxSpW{.?[)Dht w#nx]?}XmshD' );
define( 'LOGGED_IN_KEY',    'C0T(I@yg:dxiK!W%s)w}5abz[T:>yG/vJ8O>la5HX7IuOLY8sA%blJw.>?h~*tZb' );
define( 'NONCE_KEY',        '~Ig4>4*asZh[HYP2E88G@D{7Cc-{JBWS[GHbnEuO#ZM&NfT|(xB<L>lfy`OyFJ!T' );
define( 'AUTH_SALT',        '_<Q=>A!b1_L`<oV9o[N%cRLd+F&lE]+g#f-,Vvhx^(>Al!KngXD}DG5)sa5):hm=' );
define( 'SECURE_AUTH_SALT', 'F1p[b}<Das24,owLIz_Q?V&AUn=+t3Wepg|2iSGSsJS-:Fgero{{a1k=v|Jm^,9t' );
define( 'LOGGED_IN_SALT',   '.@&*J8)6;hIGs~Q$JL(Aq*9e(:&k}S)dEPhTdz#mIn]G6S]mVo/,$y}6VVOQ:SFR' );
define( 'NONCE_SALT',       'E`;mY{[hHw$k_-c7s?;E#^nMNk}Iwu#&_9[41z5ylMH!?N.C){9WP0ZLk3h?GIRv' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gwf_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
