wp<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'brunosite_local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'b');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
 define('AUTH_KEY',         'C{441O^+.t=d]b{]Q?mA< $Ec3>>.~0loVKN]d*shbR1(O[20-^klFSU<5vcP.2f');
 define('SECURE_AUTH_KEY',  'UY;nKdng&9H`)kE-g9jx+z}|4dyY.SPz8EpS$c,,YCU6C!Um-}%l.c/z9J:?d{|9');
 define('LOGGED_IN_KEY',    'g+X$0b2Y}8U^jlb@0k8/dBg:/xv [wDsKV11Q^AU,3mNC~)%>d;3EU|BGH4jx<J}');
 define('NONCE_KEY',        ':#gu^*m*o-+|dP#v4S3Vsy3DZaDvt4,0_M+_NIRAL3Oh#0OYbI7d;-g>0ouP[b{5');
 define('AUTH_SALT',        'Rs8XT`bgb{vR7K<VS6p#o.uxXS@Laf7& FgO%5LYP8(t;a1]}[tTx:/fGmFO0>!1');
 define('SECURE_AUTH_SALT', '@~/Jxr9rpj@4,f5+0|WocU8{D=%ASUyALfauHD5u`C98&<;sO6; I0-?!ASwNY{r');
 define('LOGGED_IN_SALT',   'D,zxE{6 >u_`s:wEk%14{?+Q!$Z.N>>h-px-:>:!T{@F*v_QTgQx~_y|Q;3$kv^B');
 define('NONCE_SALT',       '2)OA$}+7c-GKj.B.}Z_|l>&9:s5||Kpiix+t@7-A2V}So+ ugfLq{=m3-h_S=|,r');
