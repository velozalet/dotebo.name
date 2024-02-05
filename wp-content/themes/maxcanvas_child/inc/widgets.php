<?php
/**
 * WIDGETS
 */

add_action( 'widgets_init', 'maxcanvas_widgets_init' );
function maxcanvas_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'maxcanvas' ),
    'id'            => 'blog-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Page Sidebar', 'maxcanvas' ),
    'id'            => 'page-sidebar',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 1',
    'id' => 'footer1',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 2',
    'id' => 'footer2',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 3',
    'id' => 'footer3',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 4',
    'id' => 'footer4',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Share Links',
    'id' => 'share_links',
    'before_title' => '',
    'after_title' => ''
  ));
}

