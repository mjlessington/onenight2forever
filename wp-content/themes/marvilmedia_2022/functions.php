<?php
/**
 * marvilmedia functions and definitions
 *
 * @package marvilmedia
 */
 
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'marvilmedia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function marvilmedia_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on marvilmedia, use a find and replace
	 * to change 'marvilmedia' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'marvilmedia', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 129,
		'width'       => 560,
		'flex-height' => true,
	) );
	
	
	add_filter('get_custom_logo', 'custom_logo_output', 10);
	function custom_logo_output( $html ){
    $html = str_replace( 'custom-logo', 'img-fluid', $html );
	$html = str_replace( 'custom-logo-link', 'navbar-brand custom-logo-link', $html );
	return $html;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
    add_image_size( 'column-thumb', 220, 180 ); // Soft Crop Mode
    add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode
    
    
	/*
	 *
	 * Disable Visual editor for all users
	 */
	//add_filter( 'user_can_richedit' , '__return_false', 50 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Header Menu', 'marvilmedia' ),
		'footer' => esc_html__( 'Footer Menu', 'marvilmedia' ),
	) );
    
    

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	 /*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	*/

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


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'marvilmedia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );


	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	
}
endif; // marvilmedia_setup
add_action( 'after_setup_theme', 'marvilmedia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marvilmedia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'marvilmedia_content_width', 640 );
}
add_action( 'after_setup_theme', 'marvilmedia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function marvilmedia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marvilmedia' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	 register_sidebar(array(
		'name'        => __( 'Front Page Slider', 'marvilmedia' ),
		'id'          => 'front-page-1',
	    'description' => __( 'This is the front page 1 section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page Newsletter', 'marvilmedia' ),
		'id'          => 'front-page-2',
	    'description' => __( 'This is the front page Videos section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page Youtube Videos', 'marvilmedia' ),
		'id'          => 'front-page-3',
	    'description' => __( 'This is the front page Youtube Banner section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page News', 'marvilmedia' ),
		'id'          => 'front-page-4',
	    'description' => __( 'This is the front page Music section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page Events', 'marvilmedia' ),
		'id'          => 'front-page-5',
	    'description' => __( 'This is the front page Her Story section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page Instagram', 'marvilmedia' ),
		'id'          => 'front-page-6',
	    'description' => __( 'This is the front page Instagram section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
		'name'        => __( 'Front Page Section 7', 'marvilmedia' ),
		'id'          => 'front-page-7',
	    'description' => __( 'This is the front page Instagram section.', 'marvilmedia' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="three-column-heading" style="display:none;">',
        'after_title' => '</h2>',
    ));
	 register_sidebar(array(
        'name'=> 'Footer One',
        'id' => 'ft-one',
        'before_widget' => '<div id="%1$s"  class="foot_div %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
        'name'=> 'Footer Two',
        'id' => 'ft-two',
        'before_widget' => '<div id="%1$s"  class="foot_div %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
        'name'=> 'Footer Three',
        'id' => 'ft-three',
        'before_widget' => '<div id="%1$s"  class="foot_div %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	 register_sidebar(array(
        'name'=> 'Footer Four',
        'id' => 'ft-four',
        'before_widget' => '<div id="%1$s"  class="foot_div %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><span><i class="fa fa-twitter"></i></span>',
    ));
	 register_sidebar(array(
        'name'=> 'Footer Copyright',
        'id' => 'ft-copyright',
        'before_widget' => '<div id="%1$s"  class="foot_div %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 style="display:none;">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'marvilmedia_widgets_init' );



function mm_scripts() {
    wp_enqueue_script('jquery-query', 'http://code.jquery.com/jquery-2.1.7.js');
	
}
add_action( 'wp_enqueue_scripts', 'mm_scripts', 1, 1);


   
function load_custom_wp_admin_style() {
        //wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
        //wp_enqueue_style( 'custom_wp_admin_css' );
		
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.js', array( 'jquery' ), '3.3.1', false );
	
	
	wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');


	
	if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
		 wp_enqueue_script('jquery');
		 wp_enqueue_script('media-upload');
		 wp_enqueue_script('thickbox');
        wp_enqueue_media();
    }

	
	wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style');
wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/**
 * Enqueue scripts and styles.
 */
function marvilmedia_scripts() {
	 
	wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
	
    //wp_deregister_script('jquery'); // this deregisters the current jquery included in wordpress
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.js', array( 'jquery' ), '3.3.1', false );
	
	
	//<!-- Bootstrap core CSS -->
       wp_enqueue_style('bootstrap' , get_template_directory_uri() . '/bootstrap/css/bootstrap.css',false,'1.1','all');
       // <!-- Custom styles for this template -->
        wp_enqueue_style('mm_styles' , get_template_directory_uri() . '/mm_style.css',false,time(),'all');
    
        wp_enqueue_style('font-awesome-4.7.0' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',false,'1.1','all');
    
	
	
	
	
	wp_enqueue_style( 'marvilmedia-style', get_stylesheet_uri() );
	

    

    
       // wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array( 'jquery' ), '1.0', true );
       // wp_enqueue_script( 'popper.js', get_template_directory_uri() . '/assets/js/popper.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
    
        wp_enqueue_script( 'mm_script', get_template_directory_uri() . '/bootstrap/js/script.js', array( 'jquery' ), '1.0', true );
    
	
	
	
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
		
	if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
		 wp_enqueue_script('jquery');
		 wp_enqueue_script('media-upload');
		 wp_enqueue_script('thickbox');
        wp_enqueue_media();
    }
	
}
add_action( 'wp_enqueue_scripts', 'marvilmedia_scripts' );


add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}



/*Contact form 7 remove span*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);
        
    return $content;
});


    
    
    
    
    /**
 * Hardcodes shop item in navigation
 * @param string $items HTML with navigation items
 * @param object $args navigation menu arguments
 * @return string all navigation items HTML
 */
function new_nav_menu_items($items, $args) {
    if($args->theme_location == 'header'){
       $shop_item = '<li><a href="javascript:void(0);" id="closeMenu"><i class="fa fa-close"></i></a></li>';
       $items =  $shop_item . $items;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);





/* WordPress Automatic Updates */

add_filter( 'auto_update_core', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_translation', '__return_true' );

/**
 * Implement the Theme Options.
 */
// require get_template_directory() . '/includes/theme-options.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/includes/customizer.php';

 // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');


add_filter('widget_text', 'do_shortcode');




function new_excerpt_more($more) {
    $read_more_txt = '...';

    if (in_category('homepage-columns'))
        $read_more_txt = '... <br/> <a class="moretext" href="'. get_permalink($post->ID) . '">Continue reading...</a>';
    
	else if (is_post_type_archive('mm_news'))
        $read_more_txt = '... <a class="moretext" href="'. get_permalink($post->ID) . '">Read More</a>';
    
	else if (is_post_type_archive('post'))
        $read_more_txt = '... <a class="moretext" href="'. get_permalink($post->ID) . '">Read More</a>';

    
    return $read_more_txt; 
} 
add_filter( 'excerpt_more', 'new_excerpt_more' );


function new_excerpt_length($length) {
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');







//* Make Font Awesome available
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	//wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

}




function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );





// <- dont add in the opening tag

//remove display notice - Showing all x results
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove default sorting drop-down from WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );





// Remove "Select options" button from (variable) products on the main WooCommerce shop page.
add_filter( 'woocommerce_loop_add_to_cart_link', function( $product ) {

	global $product;

	if ( is_shop() && 'variable' === $product->product_type ) {
		return '';
	} else {
		sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text() )
		);
	}

} );







// The following should hide the quantity field for variable products in single product pages:
add_filter( 'woocommerce_quantity_input_args', 'hide_quantity_input_field', 20, 2 );
function hide_quantity_input_field( $args, $product ) {
    if( is_product() && $product->is_type('variable') ){
        $args['min_value'] = $args['max_value'] = 1;
    }
    return $args;
}







//* http://gasolicious.com/remove-tabs-keep-product-description-woocommerce/
//  Location: add to functions.php
//  Output: removes woocommerce tabs

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );





//* http://gasolicious.com/remove-tabs-keep-product-description-woocommerce/
//  Location: add to functions.php
//  Output: adds full description to below price

function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );





/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}




/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}






/**
 * Enqueue your own stylesheet
 */
function wp_enqueue_woocommerce_style(){
	wp_register_style( 'my-woocommerce', get_template_directory_uri() . '/bootstrap/css/woocommerce.css' );
	wp_register_style( 'my-woocommerce-layout', get_template_directory_uri() . '/bootstrap/css/woocommerce-layout.css' );
	wp_register_style( 'my-woocommerce-smallscreen', get_template_directory_uri() . '/bootstrap/css/woocommerce-smallscreen.css' );
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'my-woocommerce' );
		wp_enqueue_style( 'my-woocommerce-layout' );
		wp_enqueue_style( 'my-woocommerce-smallscreen' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );







function wpse82477_add_meta_boxes_page() {
    global $post;
    //if ( 'contact.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box ( 
           	  'custom-editor', 
           	  __('Editor', 'custom-editor') , 
           	  'custom_editor', 
           	  'page'
           );
   // }
}
add_action( 'add_meta_boxes_page', 'wpse82477_add_meta_boxes_page' );

 
 //Displaying the meta box
 function custom_editor($post) {          
          echo "<h3>Add Your Content Here</h3>";
          $content = get_post_meta($post->ID, 'custom_editor', true);
          
          //This function adds the WYSIWYG Editor 
          wp_editor ( 
          	$content , 
          	'custom_editor', 
          	array ( "media_buttons" => true ) 
          );
 
 }
  
 //This function saves the data you put in the meta box
 function custom_editor_save_postdata($post_id) {
        
    if( isset( $_POST['custom_editor_nonce'] ) && isset( $_POST['page'] ) ) {
 
        //Not save if the user hasn't submitted changes
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
        } 
 
        // Verifying whether input is coming from the proper form
        if ( ! wp_verify_nonce ( $_POST['custom_editor_nonce'] ) ) {
        return;
        } 
 
        // Making sure the user has permission
        if( 'post' == $_POST['page'] ) {
               if( ! current_user_can( 'edit_post', $post_id ) ) {
                    return;
               }
        } 
    } 
	 
	 
	 
	 
	// Make sure that it is set.
	if ( ! isset( $_POST['custom_editor'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['custom_editor'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_editor', $my_data );
	 
	 
	 
	 
	 
	 
 }
 
add_action('save_post', 'custom_editor_save_postdata');


















function wpse82478_add_meta_boxes_page() {
    global $post;
    //if ( 'contact.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
        add_meta_box ( 
           	  'custom-editor-2', 
           	  __('Editor 2', 'custom-editor-2') , 
           	  'custom_editor_2', 
           	  'page__'
           );
   // }
}
add_action( 'add_meta_boxes_page', 'wpse82478_add_meta_boxes_page' );

 
 //Displaying the meta box
 function custom_editor_2($post) {          
          echo "<h3>Add Your Content Here</h3>";
          $content = get_post_meta($post->ID, 'custom_editor_2', true);
          
          //This function adds the WYSIWYG Editor 
          wp_editor ( 
          	$content , 
          	'custom_editor_2', 
          	array ( "media_buttons" => true ) 
          );
 
 }
  
 //This function saves the data you put in the meta box
 function custom_editor_2_save_postdata($post_id) {
        
    if( isset( $_POST['custom_editor_2_nonce'] ) && isset( $_POST['page'] ) ) {
 
        //Not save if the user hasn't submitted changes
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
        } 
 
        // Verifying whether input is coming from the proper form
        if ( ! wp_verify_nonce ( $_POST['custom_editor_2_nonce'] ) ) {
        return;
        } 
 
        // Making sure the user has permission
        if( 'post' == $_POST['page'] ) {
               if( ! current_user_can( 'edit_post', $post_id ) ) {
                    return;
               }
        } 
    } 
 
    if (!empty($_POST['custom_editor_2'])) {
    
        $data = $_POST['custom_editor_2'];
        update_post_meta($post_id, 'custom_editor_2', $data);
        
    }
 }
 
add_action('save_post', 'custom_editor_2_save_postdata');








add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}
 
function posts_custom_columns($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'column-thumb' );
    }
}






// Elegant WordPress Solution for Dynamic Copyright Date
function marvilmedia_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "Copyright &copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}