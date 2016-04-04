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
define('DB_NAME', 'traktern');

/** MySQL database username */
define('DB_USER', 'traktern');

/** MySQL database password */
define('DB_PASSWORD', 'PassOrdFaen123!');

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
define('AUTH_KEY',         'pGl{BhqOsrJz<l/kn%;gw_%(F8#6App:?]x,H0x8<r-GpJZN@-soK=sWj1W/S KH');
define('SECURE_AUTH_KEY',  'j{-KZ5;4k.-1t_9{zvPqQ{Q+x9-?{y6Eq-an%wa&WK+F^VlOuCg@a5j-&x{55(NF');
define('LOGGED_IN_KEY',    '#z D$sxs$tny!sRA|7;SwZ@s+S/@uw|-M@k*AS[0+vTlBt[(EJ]W eIQE#U!DPvh');
define('NONCE_KEY',        '(zHAg;9}V^o3+P`p1u=Oo>JTK_;O,uq^stNjNf(!BT`-rVWWF)NNB!w5bCoH5nQP');
define('AUTH_SALT',        '%p$c-P{ty;9O8* ^OuJH[F4EXV`jcfX#CUCDj-I|K1ty9seZpW1p=E:5oK*kgolV');
define('SECURE_AUTH_SALT', '`yu.wW}``IYG3WIF@lX!K!4yu~me/kw~5!kfM2fR(RKU32Hfb)0>qLUP|;>1hX7C');
define('LOGGED_IN_SALT',   'V,za~(n{4R/ZCbr7^`3X|o7gOKr3HmmcCgJ|7p^<PG6|;S((NFFt9nnv^a8X6&SN');
define('NONCE_SALT',       'Ls-XjXyw)+|K#.9AeP;Rp>1&6<-RkZyrEwXU2{mCsI r>Y.]CM;gSeH!L#a:}w;K');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'trak_';

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
