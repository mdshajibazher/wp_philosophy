<?php
function philosophy_theme_setup(){
	load_theme_textdomain( 'philosophy');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form' ) );
	add_theme_support( 'post-formats', array('aside','image','gallery','video','audio','link','quote','status') );
	add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme','philosophy_theme_setup');

 ?>
