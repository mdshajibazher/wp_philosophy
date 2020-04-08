<?php
if (class_exists( 'Attachments' ) ) {
	require_once('inc/attatchments.php');
}
//include tgm
require_once(get_theme_file_path('inc/tgm.php'));

if(site_url() == 'http://localhost/philosophy'){
	define("VERSION", time());
}else{
	define("VERSION",wp_get_theme()->get('Version'));
}
function philosophy_theme_setup(){
	load_theme_textdomain( 'philosophy');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form' ) );
	add_theme_support( 'post-formats', array('aside','image','gallery','video','audio','link','quote','status') );
	add_editor_style('assets/css/editor-style.css');
	register_nav_menu('topmenu',__('Top Menu','philosophy'));
	add_image_size('philosophy-home-square',400,400,true);
}
add_action('after_setup_theme','philosophy_theme_setup');


function philosophy_assets(){
	//css enqueue
	wp_enqueue_style('fontawesome-css',get_theme_file_uri('/assets/css/font-awesome/css/font-awesome.min.css'),null, VERSION);
	wp_enqueue_style('fonts-css',get_theme_file_uri('/assets/css/fonts.css'),null, VERSION);
	wp_enqueue_style('base-css',get_theme_file_uri('/assets/css/base.css'),null, VERSION);
	wp_enqueue_style('vendor-css',get_theme_file_uri('/assets/css/vendor.css'),null, VERSION);
	wp_enqueue_style('main-css',get_theme_file_uri('/assets/css/main.css'),null, VERSION);
	wp_enqueue_style('philosophy-css',get_stylesheet_uri(),null, VERSION);


	//js enqueue
	wp_enqueue_script('modernizr',get_theme_file_uri('/assets/js/modernizr.js'),null, VERSION);
	wp_enqueue_script('pace-js',get_theme_file_uri('/assets/js/pace.min.js'),null, VERSION);
	wp_enqueue_script('plugins-js',get_theme_file_uri('/assets/js/plugins.js'),array('jquery'), VERSION,true);
	wp_enqueue_script('main-js',get_theme_file_uri('/assets/js/main.js'),array('jquery'), VERSION,true);
}
add_action( 'wp_enqueue_scripts','philosophy_assets' );



function philosphy_pagination(){
	global $wp_query;
	$pgn =  paginate_links(
		array(
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'type' => 'list',
		)
  );

  $pgn = str_replace('page-numbers', 'pgn__num', $pgn);
  $pgn = str_replace("<ul class='pgn__num'>", "<ul>", $pgn);
  $pgn = str_replace('next pgn__num', 'pgn__next', $pgn);
  $pgn = str_replace('prev pgn__num', 'pgn__prev', $pgn);

 
  echo $pgn;
}


remove_action('term_description','wpautop');

function philosophy_widgets(){
	register_sidebar( array(
        'name'          => __( 'About Us Page', 'philosophy' ),
        'id'            => 'about-us',
        'description'          => __( 'This Sidebar Shows About Us Page', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
	) );
	register_sidebar( array(
        'name'          => __( 'Contact Page Maps Section', 'philosophy' ),
        'id'            => 'contact-maps',
        'description'          => __( 'This Sidebar Shows Contact Us Page Maps ShortDescription', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
	) );
	register_sidebar( array(
        'name'          => __( 'Contact Info', 'philosophy' ),
        'id'            => 'contact-info',
        'description'          => __( 'This Sidebar Shows Contact Info', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
	) );
	register_sidebar( array(
        'name'          => __( 'Before Footer Section', 'philosophy' ),
        'id'            => 'before-footer',
        'description'          => __( 'This Sidebar Shows Before Footer', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class=" %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

add_action('widgets_init','philosophy_widgets');


 ?>
