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

define( 'DB_NAME', "ruouvang" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         ',2]sY1]QgF?e6JuXz6!+Pl6&%([m7[~cP_q%)Q?|.1+[)gbM;^~xl;Mq&}n.XU*/' );

define( 'SECURE_AUTH_KEY',  '1!C(9`Bb/h.-79o~!}a~v kR7<9BhS# ~T~YmBSKR!vX[8^cFJ(._vt<sH9MNL+]' );

define( 'LOGGED_IN_KEY',    'aCn#p|f >~x:Eh2cWeAu2}~VnklHl.ZU/x,YgkF+7bLp^6x$fO6u;6 tX}9jZ+xB' );

define( 'NONCE_KEY',        '-Qn]|KIS`|trT09AfuoK:.:&]ut{vxntDGjTJAXQ7le&l8eg|,TyqL+Yul_6nO.<' );

define( 'AUTH_SALT',        'G:})P(?O?n86,~]B]r+E.39]GucCOsmO)&9_KY#Xkm192 7,k~}#,BTOH9(cI}1f' );

define( 'SECURE_AUTH_SALT', '3tUSr;kI<LrSB7 8:9XX Ml8aoe<I;U@8MRo/mHcJ8`hJOwLs64VLp|9AIo@1mWe' );

define( 'LOGGED_IN_SALT',   'vNuFd788^j]8P.}|I6.kW>SlT+$|g-;KF>:AfCF~<+b;+7v0[I|hmM1&R*!k7(.s' );

define( 'NONCE_SALT',       '1V%d{b^X34#>Jx&W?SPlu:t#_sm|KG%=[,tCj<uBt-o;yy3OoM,N]!Ku.26&?;:?' );


/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'btsr_';


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

