<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
	$html = '&hellip;';
	$html .= '<div class="btn btn-info">';
	$html .= '<a href="' . get_permalink() . '">' . __('Läs mer', 'roots') . '&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>';
	$html .= '</div>';
  return $html;
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);
