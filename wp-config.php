<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aida_web' );

/** Database username */
define( 'DB_USER', 'aida_web' );

/** Database password */
define( 'DB_PASSWORD', '2q-nBr-L$hNS' );

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
define( 'AUTH_KEY',         'e;3/N!to~wGY87CLSHbr)Lbl+r!wy}svwWE-9&X9LV~{%IA][ib;hEn!l4$+aBYJ' );
define( 'SECURE_AUTH_KEY',  '4C5?O#t5Me?SJE#H(d;n1A6Vh+c3&|eXxy%24>[kuP7o<Tw{i39z9a=>|blOEK.`' );
define( 'LOGGED_IN_KEY',    'D;JI/c~ViQwvUX=_!y]8Zc/a)8qpKYv@#K50JJn+hX!U(i1o7AwJ:TVdK=oug;<J' );
define( 'NONCE_KEY',        'AGe^&#BuXDzyyKLE$4;T=&;#h<`#Y3M^<B >I)/viWL5ON=z,|yum}Q94vg@W,F!' );
define( 'AUTH_SALT',        'dEJ&TH8CMm-i Xx#23))]jtkux.3-X4?k}2!OF!glRBEP[sgf}b#&S36}va5&bW7' );
define( 'SECURE_AUTH_SALT', 'Ao!yMK-N`R1n`3_t:5vFCP}KCrca|a9n;|%;-@DT`G,;7,Y&}kkub; 7#MW)%M|[' );
define( 'LOGGED_IN_SALT',   'dNqD>:X/Vgsy:+g(kvTb8,r6UHr/&A[?I.c`%7vZp>[<w88!VspdnH]k,{y+y|-&' );
define( 'NONCE_SALT',       'Y`/S]oxBK}|L^[jP(NW_O+Usf?w*ghVQE{<N_S3PukyrcvV-%f%7uS2m[e<7th4P' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */

define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
