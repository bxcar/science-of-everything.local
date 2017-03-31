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
define('DB_NAME', 'science-of-everything');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'RSDEODOG$@5.~0m9T[>4w&8`7(xEz=yj2-(NodElz er&AsXsqqLa cN(N74H<-*');
define('SECURE_AUTH_KEY',  'Jr<FGe}$Ppci~4.F<63&lf#^OEk}.z^ 1-V<%wBNIwUL7L?u$tVVP=SLj^U[x`DN');
define('LOGGED_IN_KEY',    ';ocJb6[RiZSOS_q+:a<~Zbi1V@<glRpSGNsmUohx+B_:9dA;y+uC~^[fF-f[#Q)=');
define('NONCE_KEY',        '08zS}#oJQl%C50+RE[AM5Q6esXLl4*`?U=cgsXiR-A=d,TQrdl2wlYVKn5f,Z |Z');
define('AUTH_SALT',        '[.[XyG+E:qNe7p2`hE=gJ,X$<%DSlyNu!:xahCY&_fT HLwVD(6iyqL2Z~f9I#@!');
define('SECURE_AUTH_SALT', 'x|!-:&:R?FBW[;M[lbq>I,sfNlz0x^+OX04<:1Z1_9w]8:I`=Nr9oOw{w$K3=K2f');
define('LOGGED_IN_SALT',   'RZb*Iv^s!d1qH?t1GM3+7ym,F(d@:9y~:vfYJUh?213/e2a%7Opqd&kU%^[Qw&(/');
define('NONCE_SALT',       'P!YCM(Y-mkV1:>?<@J}zf.?%6nL5xynyV?FZ8r5-r7#l=#t?fV.=_sjaVD*aFRRc');

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
