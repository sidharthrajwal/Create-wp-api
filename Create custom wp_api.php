<?php add_action( 'rest_api_init', function () {
        $namespace = 'wp/v2/';
        $route     = '/testing';

        register_rest_route($namespace, $route, array(
            'methods'   => WP_REST_Server::READABLE,
             'callback' => 'get_book',
            'permission_callback' => '__return_true',
            
        ));
    });


function get_book()
{

	$my_options = get_option( 'plugin_settings' );
$my_options['plugin_text_field_0'];
 $my_options['plugin_text_field_1'];
	 $books = array(
	 	 'token' => $token,
       'title' =>  $my_options['plugin_text_field_0'],
      'content' =>  $my_options['plugin_text_field_1'],
       
    );

	$dayata =  wp_parse_args($books);

	 return $dayata;
}
?>
