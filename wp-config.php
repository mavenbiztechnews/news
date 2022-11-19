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
define( 'DB_NAME', 'slide' );

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
define( 'AUTH_KEY',         ' r~B7:B@m2+*Z8QUSH|JJeVM:JyL=[0@]QJEbdtvNtOxp65yAZ -#+d]oqk^zlM)' );
define( 'SECURE_AUTH_KEY',  'Awj}AKx>bS((Rvq&j={Y)i}Cy6-$%glt Ouya+SURHRLt<?G{:^r6m+w9,7h@3ut' );
define( 'LOGGED_IN_KEY',    '_0L92IJ$Y-Os|V0GM3Y%roN%K4N$bbeTghw0^)^]}MRtV6Dq]4y}_@F(zZ3lJ>B5' );
define( 'NONCE_KEY',        ']IB49*xfEsuAkq 5~[I$l`AT[TvR&T>EJyf#qTe(7KFpXD78{Vi*vA|l*bk~)TiJ' );
define( 'AUTH_SALT',        'N{<!zsM!i TWS;<fWMo9tKAs@h]m`v`7W_3D*KhsO&L^&Dm814a^GjX.S`n>NF`L' );
define( 'SECURE_AUTH_SALT', '6=0xLExC(I11|G bQ6?eEn>}w^],tcM3yeplncib`fbEP~#>[*NuCub^}m7(GXtu' );
define( 'LOGGED_IN_SALT',   'eUM!ytxs?9{Yb.1xUSgqR:C?B-G;2-`qL8).: y;ie;yk0U,c?QP209ZtG5GA+I2' );
define( 'NONCE_SALT',       '5*RrY5]2JM*RhS=*EG-l:23H3BJe$.|bHAt.$}h&hZPk2eADUsP* v<f}%*O/Z~r' );

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
