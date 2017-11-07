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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bOjl722G(RCLESk_,(cG$]ws|Nu!;-=6#+@(VsxT!/C#-+!(<p#QCw9HdCJU=FL[' );
define( 'SECURE_AUTH_KEY',  '@4(nA*Ui(q:e)OC($*uO{8o)W@>MF5J9#f<!(LM[kVwq7au$gA7s=1lL}o}Bd5v2' );
define( 'LOGGED_IN_KEY',    '~,UUa?x?vztlfp@`MTf.U:j`31!,ewQ>d58;J.wb9 vcL0{@M/eySs9+04EHCgc@' );
define( 'NONCE_KEY',        '-]FV*iDps@Wx>t7DRD=w{)9Y2lVt>@>n9Na4LGv26@#AFTN. 0Nj 2a-h^#!*6{n' );
define( 'AUTH_SALT',        'X7[^}}x?2Om.pQPKoMrfMA0$h`L#GT|: d5,ejAXEwM*aN)j2zoZWpR_7O-}o!Gr' );
define( 'SECURE_AUTH_SALT', 'zEz+s>_me$FeG 8:XNzHK;3iV{VU8mbH:L(tF/U2x$El8tl]iD?fo)t`>a&Afdpi' );
define( 'LOGGED_IN_SALT',   '1-._`=>L+E8N :;|V?ibh|>s~43)f8#_O8Hs@>ne.c<xB>-NttO@V]9xcg $FiPw' );
define( 'NONCE_SALT',       'DAF4oOKr*v5Jn!8m~#--(B?wJMqs,$iS5Mfmc33s9mJP[4.}{u+axG~qeD&r/,YZ' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'JETPACK_DEV_DEBUG', True );
define( 'WP_DEBUG', True );
define( 'FORCE_SSL_ADMIN', False );
define( 'SAVEQUERIES', False );

// Addtional PHP code in the wp-config.php
// These lines are inserted by VCCW.
// You can place addtional PHP code here!


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
