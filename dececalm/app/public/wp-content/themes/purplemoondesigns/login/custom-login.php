<?php


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