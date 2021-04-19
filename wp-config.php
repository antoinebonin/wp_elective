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
define( 'DB_NAME', 'wp_s1xac' );

/** MySQL database username */
define( 'DB_USER', 'wp_s3zd0' );

/** MySQL database password */
define( 'DB_PASSWORD', 'R3B2WEDr#@6ZnKV~' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3#5/H8;T6D*M:N2bl%y-_UrYg+X%N6:;hYY+80I((umukO3)]7q/j]]n&T2~Y+:i');
define('SECURE_AUTH_KEY', '6+ls:P81q7(-3~tfBkrtrKi&_(b&_+%;xZ9yvUFx[7F!z74x9SOAFUn#%Y[X6M)F');
define('LOGGED_IN_KEY', '&hv1migcUHYwaB97Q8WT0i@zj;5gdG(p9Q-a%9ynpjJF]xj5tw4YG7+oV0alyk/@');
define('NONCE_KEY', 'v[L622]t+9:mD-K2&5wAgXASgMyLcH8||7%0c4;AhHJ5pohk3lbFBT7_f0c/77&@');
define('AUTH_SALT', '%v16sQ%iBMs4rL6r83~0_)ZU_@T2YUaGu0o%)a1EAf1ix*1D2n*0:~27l1Ag2QA_');
define('SECURE_AUTH_SALT', 'As4sX37)A|bKGM)2S1rJx%:5e8*~TposA/w3&:K&_L1bDX7s6]90JYRqF1&b1#6z');
define('LOGGED_IN_SALT', 'PHY(tJB4d&!;Ll4*0-2)28up8[8b@8|5#uDl0050aa]67c~qE9jJX87-vT516_;a');
define('NONCE_SALT', 'VU24KTT49@!(eaUYt!]t3!@4DRX6h:wGP;z7aQGQ03w6GBI!N|8xP2OZ+99;8ub|');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'PK2VsFSKW_';


define('WP_ALLOW_MULTISITE', true);

define( 'DISALLOW_FILE_EDIT', true );
define( 'CONCATENATE_SCRIPTS', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
