<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jmongeam_www2_coneisa');

/** MySQL database username */
define('DB_USER', 'jmongeam_www2');

/** MySQL database password */
define('DB_PASSWORD', 'u.ESLd9h&1d2');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://www2.conei-sa.com');

define('WP_SITEURL','http://www2.conei-sa.com');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'BoQC0kQS0?6Ccbqb+ag`z=B.V(5|r54~^,9pTO9iBe:mg2|.(h0tsNL{r5d|KzT{');
define('SECURE_AUTH_KEY',  '`VGpiRI}C1<Q3=v0xOKDJ+VG(+_GNrylR{l5+S%K=VTgh;X.0Z%]*%|h<M|.3DG:');
define('LOGGED_IN_KEY',    '~Dfdr{jhaA[2vk$FXe[XlQvWlzfUZ|%in3bR]M.$h@3L=eQ?_@A+HX2ySzDD[uEk');
define('NONCE_KEY',        ';J3gB$<K&z(CDVQR=QO5YQ-1/0Af(|d@)m|s!.1rfo{}^^p|$/l[oOz]J+x.-hJ9');
define('AUTH_SALT',        'rri+S={Z|)kFSqx`op+V|2|3>WD9tGv!.j1<%[dL;vmh)MnO-JH-xvD/OW0t~%:s');
define('SECURE_AUTH_SALT', 'XoLAG||7A1~?ptWDkKIU/dD?#L9@>r<G?0m^<CSz:2uiQGd)4_s5c.`^RzBUm/0s');
define('LOGGED_IN_SALT',   'p|4@GYoQ[R}uM_~#W~s5gSmD(<GIg(zgs|0Aw(s.to5Pze,f|1[i/:!DfL.nE5fv');
define('NONCE_SALT',       '2S)|4XnGn3*Qg.13eFi/pV{c{ofk(}?ZAI(|H1^Ow_aE%5<Yz s-!,7=pbd!R[@3');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
