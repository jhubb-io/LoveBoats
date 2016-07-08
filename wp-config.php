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
define('DB_NAME', 'loveboats');

/** MySQL database username */
define('DB_USER', 'loveboatsu');

/** MySQL database password */
define('DB_PASSWORD', 'adWFVMU7thmP');

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
define('AUTH_KEY',         '0v+uP^U~`kE@QT4+wm+AMtJ]i}O@VZY@%/^I%-NgGuh$}Y?&r)jx??Zv6ME ]0Ug');
define('SECURE_AUTH_KEY',  'M<HpKcc:.[cPXJ*}eLNVz^R%98On;s^A.+Z~}9H`_-Hr6&OBz!6dcKR7AklX5}A9');
define('LOGGED_IN_KEY',    '=3CGI@:02E6/x!8)pRDC[ZGVlJ$2GNKVLw;{s@j@_|V}Na&G%M>>o7/&^X~UPW2{');
define('NONCE_KEY',        ' xf6/>>*VPK}A*cYQl3,yvocFZ337qy{u]i?F0=wDFG/Ug*ko7KY#e#ln+D:JiIY');
define('AUTH_SALT',        '8h!>35N{9@F:6r*^n0F=*Q?z)OS+_/plxISj[ZgJl#EK!u0K/B<:Pf>Fg?Qoh>$.');
define('SECURE_AUTH_SALT', '.VJfVFmRq*yVCiE}8X-P3tNO%R-%sh`rPO/?lW=}zkJF35!@)+)l/i.V2f}$3RBl');
define('LOGGED_IN_SALT',   '7.2|-w5-rd&1+!}x:A%gT>XM)H~6wa*qh!_&W6=dGQl*pDTFUIwFEg _P@VvtV&V');
define('NONCE_SALT',       'yR~q`5{6M^<KC|wWEMLc E&6d@-b$2y`s [0P}pNN&#Z,%kl~[P>CD*+DQ5hF+N2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lb_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
