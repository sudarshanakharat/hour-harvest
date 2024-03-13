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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'LfwLTKqRJ<B_ts}bv>%i `0}kmXb*d(ktX~<uL?2Q1>$oN NJ]{(kl&N~_o:uTXu' );
define( 'SECURE_AUTH_KEY',   'n,Lj=B]s0uM3}|x1:K#ihcqQ0<|d%Fa^dX)4KRaNc[[2GT`^t.p/fj`MQ/x=tit}' );
define( 'LOGGED_IN_KEY',     '#pUzJrPkNGJ1Z8.!e^c6L|u~Lez]^Y$S(oC0.Tvre:6@tfodnQ43lOEZWw%sL<Lx' );
define( 'NONCE_KEY',         'V 8LCk-Ic,q/V#1+$Vx0[CAsV^glM>Qcwyx*0!};CcN3V4?5f6^BRncmCKfCRfOa' );
define( 'AUTH_SALT',         'Q1^q{YrE(V6*:OM1v+gN%G}F}|l<:>wKNL,G1FUWyyNzG@?>q(GxjpkxP]{<4sj;' );
define( 'SECURE_AUTH_SALT',  '|!A)bXR5gMsZ,]_mb/^tt08$>a1f-Nz`L+stIW}@~Vkoj_3WK*jj3bHc!Bh2YTKS' );
define( 'LOGGED_IN_SALT',    'FvoJ:8<n]o`Si}q=6~?Qm-/W>-PRwXh9PbF6+f.Z?Z{Q`vb&^72^bKjl76#S2HLI' );
define( 'NONCE_SALT',        'N{M}J #R,~>byUQ}6g|Va1V|!^G<i~&qu@x/SJ8lYz.A3VX9jsE5vPC0U~8NN-7a' );
define( 'WP_CACHE_KEY_SALT', '4cCSKT*,B5*-3KlJk1qJ|TuD~hd_S)|8M`@0`:ih8pJ/;W7V<&-@6OQB#lFUktG0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
