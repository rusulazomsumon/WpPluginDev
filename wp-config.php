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
define( 'DB_NAME', 'plugindev' );

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
define( 'AUTH_KEY',         '$Dy~?V;=X>SFAcFld[+D+T5a,ekDm7|&]C6fB5yrfIY78 8A[Q{p+[eeiQcsmV2.' );
define( 'SECURE_AUTH_KEY',  '$Mq#g5h1}Z3drjo0i.!a^D2dMjIw!,{yi9o]l.29z0uS3H{>jQqJnyO?.drjCgf7' );
define( 'LOGGED_IN_KEY',    ':cjksB:i].t$yiAChJ6;+HJ/hbQ(f3:X<*fx<}/nRzWq8Cg4_vcP/R>6F5[z3w<y' );
define( 'NONCE_KEY',        'zp_Arq.xH/e1e*F-OZ[m#pF, &LLk&lsRT%^<o$Z7>uW.7=R-+NAEvha~(@Z%r]w' );
define( 'AUTH_SALT',        'q.YMYSA|O^X$>rP}w/H9}xaz^p-ZnlS/S/jquB9R)!P)dx^%Ne#NO>g,,>_~Fj}4' );
define( 'SECURE_AUTH_SALT', 'tOy-JN2(HG{$>L=Eu7KUhjV_IBq=|V -GcF@;F-C@~l>&w7i|zbVXvQBXs?On!4T' );
define( 'LOGGED_IN_SALT',   '@8K]X1Ix;_+pV ]|v*p_l]jp(2VFdWE2kUKz|(a={FBy<*gRd{)zbABB^$B:Y*8P' );
define( 'NONCE_SALT',       '}S7]8pK{ N~uFY2:-coH+-|N[HzHCtWT(pwl`DV9q{DD43CfU?<.Z/hpWA<b9PVf' );

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
