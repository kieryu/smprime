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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'smph_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r/`1q7^?C~hN_)),,4y)o?tDXR,jS~bpy tf&_xTad4W>&pnk,q$c?F<}YN@Quz?' );
define( 'SECURE_AUTH_KEY',  'J|$*,0&UpEvjWJF{&g<$t>.QIsm;Cs4^,Tj-D%%.ED[9JC{?VFgA#14.9x^$DUv8' );
define( 'LOGGED_IN_KEY',    'vv=sv+^gjg:o[B_4(`l/&I>7fYf_-:_.UN-b)mc/e8p(k$HgL@}+bt$>(LD{-<ET' );
define( 'NONCE_KEY',        '!hz0UM00E!iebNfNVFO:Wu-{KN]c>O!v4JB/Sb]kDCXqa>irXw.u|Vu{tAkD{+][' );
define( 'AUTH_SALT',        'awZlC8ivy.EVod3%,P^4.J96P=Z,L sbe46bd^M-tY]a n02&1.dxMlj7cM8V8e}' );
define( 'SECURE_AUTH_SALT', '5pFt$Ozl.::DdF.eRtBtO~^{cCZp$*s*_LKQeWHKK~Bs0w<M!L77k5eZ#}<[V. J' );
define( 'LOGGED_IN_SALT',   'f9j<lqJaIkW 5g90I^WKPyP}mC9j18I$`H co62cTLHu.#rRVP(jfNe6;X^#G^eP' );
define( 'NONCE_SALT',       'ew~;|7B`?3.w;T,VA&Hpiuy+>sCrBl;Kk)f{Cgbukz~d2YRzlxjZw?)56+g)Jgy@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
