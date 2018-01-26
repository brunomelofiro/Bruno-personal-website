<?php
/**
 * financeup functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package financeup
 */


	$financeup_theme_path = get_template_directory() . '/inc/ansar/';

	require( $financeup_theme_path . '/financeup-custom-navwalker.php' );
	require( $financeup_theme_path . '/widget/financeup-service.php');
	require( $financeup_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $financeup_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	require( $financeup_theme_path . '/customize/ta_customize_top_header.php');
	require( $financeup_theme_path . '/customize/ta_customize_header.php');
	require( $financeup_theme_path . '/customize/ta_customize_theme_style.php');
	require( $financeup_theme_path . '/customize/ta_customize_homepage.php');
	require( $financeup_theme_path . '/customize/ta_customize_copyright.php');
	require( $financeup_theme_path . '/customize/ta_customize_pro.php');



if ( ! function_exists( 'financeup_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function financeup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on financeup, use a find and replace
	 * to change 'financeup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'financeup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'financeup' ),
        'footer' => __( 'Footer Menu', 'financeup' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	//Custom Logo
	add_theme_support( 'custom-logo');

	function financeup_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

	}

	add_filter('get_custom_logo','financeup_logo_class');


	function financeup_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'financeup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

}
endif;
add_action( 'after_setup_theme', 'financeup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function financeup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'financeup_content_width', 640 );
}
add_action( 'after_setup_theme', 'financeup_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function financeup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'financeup' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ta-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'financeup' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 rotateInDownLeft animated ta-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'financeup_widgets_init' );


add_action('widgets_init', 'financeup_register_widgets');

function financeup_register_widgets() {

    register_widget('financeup_service_widget');


	$financeup_sidebars = array (  'sidebar-service' => 'sidebar-service');

	/* Register sidebars */
	foreach ( $financeup_sidebars as $financeup_sidebar ):

		if( $financeup_sidebar == 'sidebar-service' ):

			$financeup_name = __('Service section widgets', 'financeup');

		else:

			$financeup_name = $financeup_sidebar;

		endif;

        register_sidebar(
            array (
                'name'          => $financeup_name,
                'id'            => $financeup_sidebar,
                'before_widget' => '<div id="%1$s" class="ta-widget %2$s">',
                'after_widget'  => '</div>'
            )
        );

    endforeach;

}

function financeup_enqueue_customizer_admin_scripts() {
	wp_enqueue_script( 'customizer-admin-js' );
  }
add_action( 'admin_enqueue_scripts', 'financeup_enqueue_customizer_admin_scripts' );


function financeup_enqueue_customizer_controls_styles() {
  wp_register_style( 'financeup-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'financeup-customizer-controls' );
  }
add_action( 'customize_controls_print_styles', 'financeup_enqueue_customizer_controls_styles' );


/* Custom template tags for this theme. */
require get_template_directory() . '/inc/ansar/template-tags.php';

/*Load Jetpack compatibility file. */
require get_template_directory() . '/inc/jetpack.php';

/* custom-color file. */
require( get_template_directory() . '/css/colors/custom-color.php');

//Read more Button on slider & Post
function financeup_read_more() {

	global $post;

	$readbtnurl = '<a class="btn btn-tislider-two" href="' . get_permalink() . '">'.__('Read More','financeup').'</a>';

    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'financeup_read_more' );

function login_func($atts){
	ob_start();
if (isset($_POST['submit'])){
	if (empty($_POST["username"])) {
		$usernameErr = " Username is required";
	} else {
		$username = sanitize_text_field($_POST["username"]);
	}
	if (empty($_POST["pword"])) {
		$pwordErr = " pword is required";
	} else {
		$pword = sanitize_text_field($_POST["pword"]);
	}
	if($usernameErr == "" && $pwordErr == ""){
		include 'wp-content/login.php';

 }
}
	?>
<?php
session_start();
 ?>
 <?php
include('wp-content/login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	echo "
	<script language='JavaScript'>
	window.location = '/home/';
	</script>";
}
?>
<p>Log In:</p>
<form action="" method="post">
<div class="block-input">
<p>	<span><?php echo $loginErr;?></span></p>
<p> Username<span><?php echo $usernameErr;?></span></p>
<input type="text" name="username" placeholder="Username">
</div>
<div class="block-input">
<p> pword <span><?php echo $pwordErr;?></span></p>
<input type="password" name="pword" placeholder="password">
</div>
<p>
<input type="submit" name="submit" value="Log In">
</form>
<p> Don't have an account? click <a href="/register/"> here </a></p>
	<?php
	$home = ob_get_clean();
		return $home;
}

add_shortcode('login', 'login_func');

function register_func($atts){
	include "wp-content/base.php";
	ob_start();

	if (isset($_POST['submit'])) {
			if (empty($_POST["firstname"])) {
				$firstnameErr = " First name is required";
			} elseif (! preg_match("/^[a-z0-9:_\/-]+$/i",$_POST["firstname"]))  {
				$firstnameErr = "Invalid character used";
			}
			else {
			$firstname  = sanitize_text_field($_POST["firstname"]);
		}
		if ( preg_match('/\s/',$_POST["middlename"]))  {
			$middlenameErr = "No spaces allowed";
		}
		elseif (!empty($_POST["middlename"])){
			$middlename = sanitize_text_field($_POST["middlename"]);
		}
		if (empty($_POST["lastname"])) {
		$lastnameErr = " Last name is required";
	} else {
		$lastname = sanitize_text_field($_POST["lastname"]);
	}
	if (empty($_POST["address1"])) {
		$address1Err = " Address is required";
	} else {
		$address1 = sanitize_text_field($_POST["address1"]);
	}
	if (!empty($_POST["address2"])){
		$address2 = sanitize_text_field($_POST["address2"]);
	}
	if (empty($_POST["sta"])) {
		$staErr = " State is required";
	} else {
		$sta = sanitize_text_field($_POST["sta"]);
	}
	if (empty($_POST["zip"])) {
		$zipErr = " Zip Code is required";
	} else {
		$zip = sanitize_text_field($_POST["zip"]);
	}
	if (empty($_POST["phone"])) {
		$phoneErr = " Phone Number is required";
	} else {
		$phone = sanitize_text_field($_POST["phone"]);
	}
	if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
      $emailErr = "Invalid email format";
	}elseif ( preg_match('/\s/',$_POST["email"]))  {
		$emailErr = "No spaces allowed";
	}else {
		include 'wp-content/checkemail.php';
	}
	if (empty($_POST["username"])) {
		$usernameErr = " Username is required";
	} elseif ( preg_match('/\s/',$_POST["username"]))  {
		$usernameErr = "No spaces allowed";
	}else {
				include 'wp-content/checkusername.php';
	}
	if (empty($_POST["pword"])) {
		$pwordErr = " password is required";
	} elseif ( preg_match('/\s/',$_POST["pword"]))  {
		$pwordErr = "No spaces allowed";
	}else {
		$pword = sanitize_text_field($_POST["pword"]);
	}
	if($firstnameErr == "" && $middlenameErr == "" && $lastnameErr == "" && $address1Err == "" && $staErr == "" && $zipErr == "" && $phoneErr == "" && $emailErr == "" && $usernameErr == "" && $pwordErr == ""){

		include 'wp-content/userinfo.php';
		session_start();

		$_SESSION['login_user']=$username; // Initializing Session
		echo "
 		<script language='JavaScript'>
		window.location = '/home/';
	 	</script>";

 }
}

	?>
	<?php
 include('wp-content/login.php'); // Includes Login Script

 if(isset($_SESSION['login_user'])){
 	echo "
 	<script language='JavaScript'>
 	window.location = '/home/';
 	</script>";
 }
 ?>

<p> Already have an account? click <a href="/log-in/"> here </a></p>
<b> * indicates required field </b>
<form action="./" method="post">
<div class="block-input">
	<label> First name * <span><?php echo $firstnameErr;?></span></label>
	<input type="text" name="firstname" placeholder="First Name" /``>
</div>
<div class="block-input">
	<label> Middle name <span><?php echo $middlenameErr;?></span></label>
	<input type="text" name="middlename" placeholder="Middle Name" />
</div>
<div class="block-input">
	<label> Last Name * <span><?php echo $lastnameErr;?></span></label>
	<input type="text" name="lastname"placeholder="Last Name">
</div>
<div class="full-width-input">
	<label> Address (Line 1:) * <span><?php echo $address1Err;?></span></label>
	<input type="text" name="address1" placeholder="Address (Line 1)">
</div>
<div class="full-width-input">
	<label> Address (Line 2:)</label>
	<input type="text" name="address2" placeholder="Address (Line 2)">
</div>
<div class="block-input">
	<label> State * <span><?php echo $staErr;?></span></label>
	<select name="sta">
	<option selected value=""> State </option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="CO">Colorado</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
<p>
</div>
<div class="block-input">
	<label> Zip Code * <span><?php echo $zipErr;?></span></label>
	<input type="text" name="zip" pattern="[0-9]{5}" maxlength="5" placeholder="5 digit Zip Code">
</div>
<div class="block-input">
	<label> Phone Number * <span><?php echo $phoneErr;?></span></label>
	<input type="text" name="phone" pattern="[0-9]{10}" maxlength="10" placeholder="(XXX)XXX-XXXX">
</div>
<div class="full-width-input">
	<label> E-mail address * <span><?php echo $emailErr;?></span></label>
	<input type="text" name="email" placeholder="E-mail address">
</div>
<div class="block-input">
<label> Username * <span><?php echo $usernameErr;?></span></label>
<input type="text" name="username" placeholder="username">
</div>
<div class="block-input">
<label> pword * <span><?php echo $pwordErr;?></span></label>
<input type="password" name="pword" placeholder="password">
</div>
	<p>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	$home = ob_get_clean();
	return $home;
}

add_shortcode('register', 'register_func');
