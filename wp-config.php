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
define('DB_NAME', 'mama');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '1234');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')O_LZGE<Vj6=F6Qs.7_unCLV9d!*$c/.R?Bt,?k2q-(9kg`mK?l0_pb%i5rrmLg5');
define('SECURE_AUTH_KEY',  'vN^kS2:ngX69hxdB ksodKE76BAiBZ[f&O^Rr+qxF?{Y<F`oQ9)o%pa,,FB8%7]a');
define('LOGGED_IN_KEY',    '5L) (hKJ?pu: Vq+Z}ikBVRzD;q(&mC7]Q-BsSRlR%NH9dUD~j#yJ*MDEG%3Db D');
define('NONCE_KEY',        '1wP&<J8{k[bzH}NAXm<}[2@3[au~Jj$tex%BuoKTc3&Aw0.W)u99ZI*uYTQraM%4');
define('AUTH_SALT',        '=7B<EDUNt4 tb%5:~W.r]|GqsX;Iv+:ESQo+qwFIY5WiiS@c+ReZs2qvL{LS}R/^');
define('SECURE_AUTH_SALT', '>{6#Rph[W,*zwQ.n.j:OZN]X|hhMJgXD3p82 U2V4+l13=dE]#FY^66%~,mb}{wt');
define('LOGGED_IN_SALT',   'QT%3/70 YmL(lhD~elCOD5Z*zbP8)YH5KN4~&)(r/1e{N=NqQ.p7Me7{_ZNREkCs');
define('NONCE_SALT',       '&S`U~u.+(6oui2;()/M5g?g3{tg#?WX_bpo=(T=B=AI5;Dw:LoSO,}( VJBhw2po');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
