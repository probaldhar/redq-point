<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_woo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ';B-|b>%.Z%.[wS<*iU-8Qfk59oC-S~>p:&]xl^n2|q%1Tm_m[>=1&;!A_K]5Xr-~');
define('SECURE_AUTH_KEY',  'Ucb3]?E.8UQWiQyy~/rPppn{Pi$[*)c>|,?6l5rzeb(BL:@N{-x{>X: jzXfM:YB');
define('LOGGED_IN_KEY',    'E=b!->4u)q2X-87kR|8F`HAsIPFGUlq}z&O_$HBJ66ro9Wr#b!BVV3Y^06]XKmY8');
define('NONCE_KEY',        '(jP<RbiHpS?)?{bafry>t56!?>>TI@ghCvYcdO<]J-~6CXLB[}C!=Ian1#e[41=T');
define('AUTH_SALT',        'ze+>iL+8dk+4sdKL_,E5nrBY9-yq,*Dz(7YP*hqMzrcKy=SuYj|Ym,@.xj8:2m@r');
define('SECURE_AUTH_SALT', 'hE;Qf[|_JE:!SUy5^d/<aDBW!.RU]D$tZ*$MUDCSdM)KhL-r=VyCJ[an2[xx`KbW');
define('LOGGED_IN_SALT',   '.3/Gkp8g+ye!pt>F}rBDrobInX&oPfMoLzJA.(LyO*=_#k3{EE_O,*Z+P i3Y([!');
define('NONCE_SALT',       'vmNoDB-$UsXRl =?2h|6p)r#S_I;_|z?j(0X,-2(Bt=cJq#:FEUrJ*C>j$r?a;jx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
