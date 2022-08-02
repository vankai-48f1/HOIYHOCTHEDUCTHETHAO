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
define( 'DB_NAME', 'hoiyhoctheducthethao' );

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
define( 'AUTH_KEY',         '5U,Jk2d~)s<`[W}>aR5=f7U-,1PGy=^PR?2#=VMSh/@h7D?erSl}zK+nH)Z|nNOr' );
define( 'SECURE_AUTH_KEY',  '&Tq)|8`{npFwd7YC(EHKI.GHppQ|M4vRr5lEHX=)P_{gwm3)ut3]vMQ{[-s|TKR<' );
define( 'LOGGED_IN_KEY',    '@uMFm0$w;O?_RJ/|bQj:s{^ 2&>GIo[snT^:;.El!gcr}c{NY(7GR@#$sE?>.*__' );
define( 'NONCE_KEY',        '_i@b&i(|;({u:)RFaU{NwTpKs*Kg1Y_6+>p8w0bsH$%z@bqV;qjJ5VQd1aBx<:3`' );
define( 'AUTH_SALT',        'qWk-DK-P+)Bg6f<(qwJFAt$5CwFb/1i>IfZKbB/ElHM?q2R]_;u(~I%P>hrkYaX|' );
define( 'SECURE_AUTH_SALT', 'u+Kfuq<Gac/v}1j.mN8a=@)0pn4x#|w.$V?`a=&M}q@csDZ(KX>ox?r2&c78f)t`' );
define( 'LOGGED_IN_SALT',   '#K ERy6_KbHC~1gi%rqf;{w!^0=Z~~;,D/[f`ATrL4g+;OUU!{AKW.zdm`!$1f81' );
define( 'NONCE_SALT',       'i]6YbenYeug<,sCt;GP-boLD}2{|qJjm#z:sD,i.t+W0l<~*U&j5(9A.x>I-bOO]' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hyhthtt';

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
