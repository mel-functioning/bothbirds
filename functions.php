<?php
/**
 * The functions for our theme
 *
 * @package Both Birds
 * @since 1.0
 * @version 1.0
 */
?>

<?php
/* Link to the style sheets & fonts */
function mg_main_style() {
  wp_enqueue_style( 'main_css', get_stylesheet_uri(), array(), '1,0,0');
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Alice|Merriweather:400,400i|Open+Sans:400,400i', false);
  wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false);
}

add_action( 'wp_enqueue_scripts', 'mg_main_style' );



// Change menu order:
function bb_custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'bb_custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'bb_custom_menu_order');



/* Enable featured image uploads on posts and pages */
add_theme_support( 'post-thumbnails' );



/*
function add_image_sizes() {
  add_image_size( 'sq-thumbnail' , 300, 300, true);
}
add_action( 'init', 'add_image_sizes' );

// Register the useful image sizes for use in Add Media modal
/*
function display_image_sizes($sizes) {
$sizes['2-col-thumb'] = __( '2 Columned Image' );
return $sizes;
}
add_filter('image_size_names_choose', 'display_image_sizes'); */



/* Enable custom header image */
// $custom_header_args = array(
//   'flex-width'    => true,
// 	'width'         => 2000,
//   'flex-height'   => true,
// 	'height'        => 700,
// );
// add_theme_support( 'custom-header', $custom_header_args );



/* Add Custom logo Support */
function bb_custom_logo_setup() {
    $bb_custom_logo_args = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $bb_custom_logo_args );
}
add_action( 'after_setup_theme', 'bb_custom_logo_setup' );



/*
* Registers multiple menus; called with wp_nav_menu() function.
* From: http://codex.wordpress.org/Function_Reference/register_nav_menus: This function automatically registers custom menu support for the theme, therefore you do not need to call add_theme_support( 'menus' );
*/
function register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'secondary-menu' => __( 'Secondary Menu' ),
    )
  );
}

add_action('init', 'register_theme_menus');



// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

global $wp_version;
if ( $wp_version !== '4.7.1' ) {
   return $data;
}

$filetype = wp_check_filetype( $filename, $mimes );

return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
];

}, 10, 4 );

function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
echo '<style type="text/css">
      .attachment-266x266, .thumbnail img {
           width: 100% !important;
           height: auto !important;
      }
      </style>';
}
add_action( 'admin_head', 'fix_svg' );



// Excludes category names from search results
function SearchFilterPosts($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilterPosts');




// Defines Global Footer Details under Settings > Global Footer Details to specify company contact details for pulling through into the footer. MB
add_action('admin_menu', 'bb_add_gfd_interface');

function bb_add_gfd_interface() {
	add_options_page('Global Footer Details', 'Global Footer Details', '8', 'footer-details', 'bb_global_footer_details');
}

function bb_global_footer_details() {
  ?>
	<div class='wrap'>
	<h2>Global Footer Details</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>Email:</strong><br />
	<input type='text' name="email" size="45" value="<?php echo get_option('email'); ?>" /></p>

  <p><strong>Facebook:</strong><br />
  <input type='text' name="facebook" size="45" value="<?php echo get_option('facebook'); ?>" /></p>

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="email, facebook" />

	</form>
	</div>
	<?php }




// Home Recent Posts Pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }


  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo; Prev'),
    'next_text'       => __('Next &raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}





/**************** HERE START THE CUSTOM FIELDS *******************/
