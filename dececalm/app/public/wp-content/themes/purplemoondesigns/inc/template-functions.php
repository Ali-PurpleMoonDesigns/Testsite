<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package purplemoondesigns
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function purplemoondesigns_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'purplemoondesigns_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function purplemoondesigns_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'purplemoondesigns_pingback_header' );



///////////////////////////////////
// LOGIN PAGE OPTIONS

function modify_logo() {
    $logo_style = '<style type="text/css">';
    $logo_style .= 'h1 a {background-image: url(https://purplemoondesigns.co.uk/themedev/Purple-Moon-Designs-logo.png) !important;}';
    $logo_style .= '</style>';
    echo $logo_style;
}
add_action('login_head', 'modify_logo');

function custom_login_url() {
    return 'https://www.purplemoondesigns.co.uk/';
}
add_filter('login_headerurl', 'custom_login_url');

function custom_login_css() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login/custom_login.css');
}
add_action('login_enqueue_scripts', 'custom_login_css');

function custom_link() { 
?><p style="text-align: center; margin-top: 1em;">
        <a class="pmd-wp" href="https://www.purplemoondesigns.co.uk/" target="_blank">If you have any issues or questions, visit our website</a>
    </p><?php 
}
add_action('login_footer','custom_link');

// USER LOGIN OPTIONS OPEN

add_filter('authenticate', function($user, $email, $password){

    //Check for empty fields
    if(empty($email) || empty ($password)){        
        //create new error object and add errors to it.
        $error = new WP_Error();

        if(empty($email)){ //No email
            $error->add('empty_username', __('<strong>ERROR</strong>: Email field is empty.'));
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //Invalid Email
            $error->add('invalid_username', __('<strong>ERROR</strong>: Email is invalid.'));
        }

        if(empty($password)){ //No password
            $error->add('empty_password', __('<strong>ERROR</strong>: Password field is empty.'));
        }

        return $error;
    }

    //Check if user exists in WordPress database
    $user = get_user_by('email', $email);

    //bad email
    if(!$user){
        $error = new WP_Error();
        $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
        return $error;
    }
    else{ //check password
        if(!wp_check_password($password, $user->user_pass, $user->ID)){ //bad password
            $error = new WP_Error();
            $error->add('invalid', __('<strong>ERROR</strong>: Either the email or password you entered is invalid.'));
            return $error;
        }else{
            return $user; //passed
        }
    }
}, 20, 3);

// CHANGE LOG IN DETAILS
add_filter( 'gettext', 'username_change', 20, 3 );
function username_change( $translated_text, $text, $domain ) 
{
    if ($text === 'Username or Email Address') 
    {
        $translated_text = 'Email address';
    }
    return $translated_text;
}

// USER OPTIONS CLOSE

// LOGIN OPTIONS END
///////////////////////////////////

function my_admin_menu() {
		add_menu_page(
			__( 'Theme dev', 'my-textdomain' ),
			__( 'Purple Moon Designs', 'my-textdomain' ),
			'manage_options',
			'sample-page',
			'my_admin_page_contents',
			'https://purplemoondesigns.co.uk/themedev/PurpleMoodDesigns-dashicon.png',
			3
		);
	}

	add_action( 'admin_menu', 'my_admin_menu' );


	function my_admin_page_contents() {
		?>
<div class="wrap about-wrap thb_welcome thb_product_registration">
	<h1>Welcome to <strong>Purple Moon Designs</strong></h1>
	<p class="about-text welcome-text">
		
              Purple Moon Designs provides free support for 1 month for every theme developed by us.</br>
              You will also be able to receive support through our subscription services (<a href="https://www.purplemoondesigns.co.uk/support-packages/" target="_blank">on our website</a>).</br>
               </br>
              <strong>To contact Purple Moon Designs, please see below.</strong>     
	</p>
	<p class="wp-badge wp-thb-badge">
		Version: 1.0
	</p>

<h3><span class="dashicons dashicons-phone" style="font-size: 25px; margin: 0 20px 0 0;"></span><a href="tel:03300435929">0330 043 5929</a></h3>
<h3><span class="dashicons dashicons-email" style="font-size: 25px; margin: 0 20px 0 0;"></span><a href="tel:info@purplemoondesigns.co.uk">info@purplemoondesigns.co.uk</a></h3>
<h3><span class="dashicons dashicons-admin-links" style="font-size: 25px; margin: 0 20px 0 0;"></span><a href="https://www.purplemoondesigns.co.uk">purplemoondesigns.co.uk</a></h3>

</div>
		<?php
	}


function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Services menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );