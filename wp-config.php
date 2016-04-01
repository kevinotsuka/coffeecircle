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

// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["DATABASE_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);  

define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);

define( 'WP_MEMORY_LIMIT', '128M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&V -a@h/g^/IhsEu2}|-*y.q4;T^;.3q E*jwHj^Gr8KD>R]dKu~>!M4I-sazq{7');
define('SECURE_AUTH_KEY',  'ue:(XVEN{i(|gc}q^l6GZARx}&I}=UFkRM*E[}.dcIZ >(5l`o-g]5&mO:*aMtIK');
define('LOGGED_IN_KEY',    '%a3}S,,n5Rd_;qk{-{V(JZn|~A[k!-z8mA0-fzbGf{x%o?0p0lS%1Vd7rVM>jga1');
define('NONCE_KEY',        'mN2/{G0d8ysvC?@iGTj*Z>/H<!c:{)((q$c-x.+- %8zw9e::vfRxrIaNv|00|:|');
define('AUTH_SALT',        '{Mm%z7.b~~CJ>KMhC:bSRc*@58g(=K3% Bh|jPX`4+%%Rk01Larc96Q8zV(.1vis');
define('SECURE_AUTH_SALT', '<Bn4%ud`i{6?bwj|R>;N.W%BDogx{4]Gpgd4vqJ-pB*,J-)-#lv/9|@%84arXCkt');
define('LOGGED_IN_SALT',   'zmY_0O}Tb$ISa:6D<-iF!-q^B.7RWL| OJF)+W=SJcM|zSe]C/U^lz(~=DQ+QQI`');
define('NONCE_SALT',       'SBRFrQmt$lwsR^t*&Y]{FgV`^wol+F!u-;^vmv@xzs-W55+*+^]WpAp7M)U6!f$`');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
