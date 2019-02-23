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
define('DB_NAME', 'i1021247_wp20');

/** MySQL database username */
define('DB_USER', 'i1021247_wp20');

/** MySQL database password */
define('DB_PASSWORD', 'E.(VNjkx&5jzTQwUSy^66.(2');

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
define('AUTH_KEY',         'XrZAbff6s2fG77X7VLKsA2wcME7LO4snw1TszqQGVhxbkWRlsRno8uIT5C1HHRme');
define('SECURE_AUTH_KEY',  'B57fRhuimKnLPAV4bgJho8h34ELFsKheVIxMx79y04gLuMZyrvbnbuBJlQOIO3Ck');
define('LOGGED_IN_KEY',    'Aws1hn1luUoF3TzUJFCVs05su7HLWFdeMkflOher6NC9q5nyOOF8mR4afBGV3lIX');
define('NONCE_KEY',        'LOP2ugPhqxLOfI0fSoi7dqTsiklLCsrV4fMFvGgB6gVhhF4So9izMlVjlXthKQVn');
define('AUTH_SALT',        'LHywB9LpCzWEdv76Krzd38iI41oPW1RvL7GtisxjcPgjnykb2qngjKEUKlkM4l1e');
define('SECURE_AUTH_SALT', 'rKWlH5XuPrK1Uu9fsHRQCLhNyVGuHnhABhGAyP0iSNjkofQFiz0dTcLcgMcq64ry');
define('LOGGED_IN_SALT',   'RA9cnbyoEHVvs0kpURZeTiFt3o8iXyZI3tgFLkTzbbe1mHjCzpe2ReyjvSOqWZjw');
define('NONCE_SALT',       '5RkFoV57jFDT1C9EadsyLIWi47G36GUb8yMQBXMI7hDaLT7PQapn1OoTlE4XUJ7u');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
