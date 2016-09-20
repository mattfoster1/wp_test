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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'on)bn8]V28&@Ip/MJaxON9iGJ^7rwH{2,Kn<e=1V1JSBef9:hBVTxnPJ{k1+.zMd');
define('SECURE_AUTH_KEY',  'QzWP,%3ufR1Axakg;;rIvU>5rXlCO:+m|Kr0TH#YkB/ l7}D:=ue^04RFQ`DfH#U');
define('LOGGED_IN_KEY',    'Qa_%RW9Nsm2h6yHwv4-CM[PVAzfhP?y?~ZATcrb+BX+ZdRRs`/~LY>mPYXaC]zH=');
define('NONCE_KEY',        'f6 Ulw6VdUmg@ak9DJo%({jZ7!vq1>7(5N]fv+wct:e[]5<WK$0(oPBIlsY]k3K4');
define('AUTH_SALT',        'yD!]K-P=O~`Aqj_,zkCigAgxm~oufI`L(6X~@67e)b-]ERSrhb;sBq{nyy!c~N#G');
define('SECURE_AUTH_SALT', 'Nufy<jQ5m@}qy],[P.u`qyz`H#/ _GU`ew}_F>Eh1j3^Xho{=TkPO;HQ )x?5s1z');
define('LOGGED_IN_SALT',   'iKT.4?48@ey~=5fpru#CkELG$@e`ra{r7-#L xhkNh3YaHuGeJwfbW-ei^wfl$Mi');
define('NONCE_SALT',       '2%;ef[27s<41ZHLzO,oIlA?uA>)^2/IF~P!~(4Sju68TSf EHi}243Q@Z#O)zDr0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
