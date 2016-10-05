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
define('DB_NAME', 'savina');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '9U^pmC$1Zw$][CGN[}*!&`*`:nnr~!|dk^?kSFW`3wfnjcqq17$;J*Vr%Y58G;{A');
define('SECURE_AUTH_KEY',  '[nJ,BNy%9a6dH$#Cs@NIywpj $c;GP;{7@v@!pPWNzs74H7XgTEEbc!Mn]utB)Ok');
define('LOGGED_IN_KEY',    'YQZ;>b Fkhm+b%0?/~57w@u[y5~>]#xXF!|| Yn&N6t}u*w.+%WSr8S{{%)PR%7l');
define('NONCE_KEY',        '0#]](Fx;YIhhPE$gb{cX;XW127QWYiFuXfg7N}}Qc/cR+R=.qO5 Cb;[g$#7eAvX');
define('AUTH_SALT',        '_0)&/~UllL(EyN,EPSInQM7eyatQKfo44-tK`A2!E1v3 IY.-QAwU&[h$gG]k#TZ');
define('SECURE_AUTH_SALT', 'X-Dv#-i,FW{&%8wp8$w&T21Edx)UxT1Mcc35iv_&NLE.1-wJH|Ll20`;M,>N/>+e');
define('LOGGED_IN_SALT',   '.C*/62wx*8SGk2o[-&`QX&hF9V.jM]-WZEOxB=VE0=X{8uk5[)c.U|Q0`XE-Dc&,');
define('NONCE_SALT',       'oqg, =@.$qyl9w~!E,kZu!%T=cT2tVeB#&p#nH~E$?GAK=>c`lrqWG^_*e)bc!Uw');

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
define('WP_DEBUG', true);
define('WP_HOME','http://localhost/savina/'); 
define('WP_SITEURL','http://localhost/savina/'); 
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
