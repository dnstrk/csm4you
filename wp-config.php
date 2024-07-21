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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_csm4you' );

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
define( 'AUTH_KEY',         'lSFG<m =.B5&tfYN__b1!F[>TJv<A?,:E~[: cBySSGJb]%0uhh6+8d9I|w).WQ>' );
define( 'SECURE_AUTH_KEY',  '|8+t/f/V CdpV!iB;7z8|dt]Nn3o7@IQ>z5C0J`6/JdzR0AZ|!71Mj/_L7E]No[!' );
define( 'LOGGED_IN_KEY',    'an$KC=<L#+Dc`i@hdaZP^>m;|AnfM4Y=Y]5YTOiO|%b]GpLyD;B$TlXp-at=`1hF' );
define( 'NONCE_KEY',        'inY.Az6[OhGEDvpY~.h;lWyiJZC^=KFVHD!rBJ/]u5T4/K-};0a@lI~pU0eoczr+' );
define( 'AUTH_SALT',        'ES-wznALQ^}<1#9iy zJqO<vXv]^W!_atF4zX#~0v^r0(nIKH<2a}`=taQ,yiv@(' );
define( 'SECURE_AUTH_SALT', '*^3Bj3qj:Q#f=#~RAL7zGO;P[Hh ZFlgx|=2_e6s5m IJP88&Sf!}6Jl{yiqghhg' );
define( 'LOGGED_IN_SALT',   'F1i`Yq8$mc`p$cycCb;DsR`L+nH&:*]-bbf0P8RPvy,yk: VH6B;,dK{`<Fl<U/-' );
define( 'NONCE_SALT',       '`k8pYXb)mRI0i JF{_O|7Hl[+9cz3xtv~HA>o!L#G4V%cD%,9)x!hez6R^Dw 6mO' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
