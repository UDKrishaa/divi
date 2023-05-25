<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'divi' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'XiySPvfP%zNJl.Q]o5N2dQY~gQj^Qwar F,l&mH@OUN>{yzH2B#M%;qp:f,bKtJ9' );
define( 'SECURE_AUTH_KEY',  '/`G.S5T4[l@wPGNCi|bpdoMs_9,B,AJ5DJ:G9X0K{Mn)j+O]Sb~5?1j|Di3? 4W?' );
define( 'LOGGED_IN_KEY',    'BpxZma/)m/hFM+o^jA;L.1h 0>Ct,~Y<m7ynjH/3kV.#q0q*k6-Zo+xR</zS3[S^' );
define( 'NONCE_KEY',        'Ti<z`D<b:Q$nld5ewK>=M3IwGu@;,4L7]pLOn=l}upM^l;A:m*;9p|@NKR02EGhv' );
define( 'AUTH_SALT',        '&XE|aU%TW*HZ)6,6)hCq0wb/<ujv=;3sl<*O_lqMxe|IhkIqxtYx_NZCHOrP?WLX' );
define( 'SECURE_AUTH_SALT', 'vJAm-~1EQ^8/$e.Gk:3YEOj8`%9le.H{}Z>.*bnmm/,KdoMm|;Vd}G;H 0%7/XIc' );
define( 'LOGGED_IN_SALT',   'H^s[S;{h(fF>F~H1HIeewCJ.}!Bv+F~sr/}2!o~T$#Y3:bN?HK~0N,X0d*EWNI52' );
define( 'NONCE_SALT',       'WrwQXr3,^((yb(Ch._dv[_ztG6@7*OG;,qa8V_vi8xNQMM|vEDFoHE[DFEE9oUT|' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
