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
define( 'DB_NAME', 'picart' );

/** MySQL database username */
define( 'DB_USER', 'picuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'picpassword' );

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
define( 'AUTH_KEY',         'Qg1QM3],#:ug%.{kQ$U}^HULUr)Aw*I/j^Y.cy)?ZAD=DB*f$(>%fB(&C3=#vv0a' );
define( 'SECURE_AUTH_KEY',  '+XoHtHY+(.FkV.tB78IY?h*^.ek1_s)N5X&]{^COslXOc-v_uhclwyR&)mTL/oSk' );
define( 'LOGGED_IN_KEY',    'ip?^PEXOe3sxKEX@kHRAkMn68*0$<bL;K(p|TPh5R;PE;&jz=_;[0SRjKES7~~?(' );
define( 'NONCE_KEY',        '2JqSY0@< 3j4k.>ECe>]{sY#rq2rv~O%*eirc8I>ny`M!LS$9~Fl=]=B(xQt2X#(' );
define( 'AUTH_SALT',        ';]7sThyuL%NwhU>.VcB^P]p2|SJV|0WrC-Rd^/`,Lifv( y-h)fV24Af+uA~M_`*' );
define( 'SECURE_AUTH_SALT', '6}V)XKZ)Ot>D;-6iv;.7xTs)?h@yk(7KO?v_Is.V%#&s)OpsOrH>/F,,b$:Rq/kQ' );
define( 'LOGGED_IN_SALT',   '}+Q?w)+p85c3OC]-$I:?b(z66:RT4k$uqoN{U2*zI&OZLA^`a>U4Adn5mC57Io9f' );
define( 'NONCE_SALT',       '&Uc_F,EF,!8nZ0V_L+QhNjRu-tJp*g+U$iVT?KfP+vM4~%B!:uOj.{<qj6lMj}/o' );

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
define('FS_METHOD','direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
