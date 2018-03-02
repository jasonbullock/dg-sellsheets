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
define('DB_NAME', 'jasonbullock-wordpress-test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         't*;igUrL9n~ 1=-/;3M[vRtZG zoikD?lch3!q?B)k#Q^:~[%g,_)chat>)LL|Ul');
define('SECURE_AUTH_KEY',  'IOi2N_#,N`=2LsprGrk>Z OF#q6E#{^(MSr{G_|S>CqKlJ.coWo+V8W%gxRb|[*X');
define('LOGGED_IN_KEY',    'SQKCb}NfKp2O7w^ujZn.`OJ]ih2b/MRX^UqhNi|1d}7*_6GLQQaNqXyt+7s-uEOD');
define('NONCE_KEY',        'iaf- ->nj^AHG0]4>c.iB]4oVq-yomlC2%)J/FDH=-/&f1H%ID5:fS;m.%@S#wPh');
define('AUTH_SALT',        ',wm1GBr6CQfXX2;2K;cg9!<!(L<(Z3u,J|~U,U.8= 8rJ:SAm<HHE_-:)X|gq@<X');
define('SECURE_AUTH_SALT', ' 6Bo+?>=_.aI9d@E-Ji?F=,3;Nt_+4q5=vMswWDCH_E.K?8MW_]s:JF63U^4sQ5b');
define('LOGGED_IN_SALT',   '9M70f( rfkE:D%,4hS<FKae;8j(nAZJ(XFvGp{P<0?C4A_.iEd$_TQlN?r0EMA@*');
define('NONCE_SALT',       '9JBpok+fB=lZwHfkn(r0~$kQ+ivm{cmmvPnD1HJT?)x2o>nttO2p?Ch+;wPb47Py');

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
