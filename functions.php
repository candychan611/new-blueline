<?php

if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'name' => 'Left Sidebar',
    'id' => 'left-sidebar',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>'
  ));

  register_sidebar(array(
    'name' => 'Right Sidebar',
    'id' => 'right-sidebar',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>'
  ));

  register_sidebar(array(
    'name' => 'Above Title of Full Post',
    'id' => 'single-above-title',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>'
  ));

  register_sidebar(array(
    'name' => 'Below Title of Full Post',
    'id' => 'single-below-title',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>'
  ));

  register_sidebar(array(
    'name' => 'Below Content of Full Post',
    'id' => 'single-below-content',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>'
  ));
}

?>