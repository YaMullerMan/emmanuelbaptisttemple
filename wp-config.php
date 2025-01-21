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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ebtWebsite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '4uq+MyKBsLI.oY<Y/63G,q-64iqD8!(fyG=)#|3T0CNV{es2;L&F.-02Z/la<UqV' );
define( 'SECURE_AUTH_KEY',  '^*tnSn;i7`) xR Pz&+xVFC;s)1Wv=EX37/5kZ]yr:j>zp,Gb6I5RPtlK[k/9KG{' );
define( 'LOGGED_IN_KEY',    ')sI>=:FRid>&d4KkCkqK:<|@kSJNd#F#;6gb2))8}*.c?~G{AGLicNJ0;PsR2+i7' );
define( 'NONCE_KEY',        ' CMey;hKc/PUQ)>VxZTFa2P(~m!Ym<El2UJ ,Yb8O@Y`n&Lw.jq@Iq)xr4<et}j:' );
define( 'AUTH_SALT',        '{lNBy!*^zEac<S<LF=BcjoRtRuYd<Yv]=>ty()%:[rqS&0u1G2m/|U^%rp8C,V?9' );
define( 'SECURE_AUTH_SALT', '7g|fEtRXDfDxDDc-*~5R?*s=*}{n%r$zuCiW@8$oD 3NwoxpD1G@:QBJQ[#CC/=V' );
define( 'LOGGED_IN_SALT',   '[d$N!YoEw6pan5bb2/!]p&bgg( 3LJ>7o0.C1:q2dDwg;B:Sf(pZ,nnihe:w`[dR' );
define( 'NONCE_SALT',       ',va*a_b5IN_5=c3C.fhcVep@f$Ra/?MAv8QnmaiMy&1ep]u3k+!#|C1R;!xb~XE=' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
