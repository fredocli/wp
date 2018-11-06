<?php
require_once 'wp-load.php';

/*
 https://codex.wordpress.org/Class_Reference/WP_Meta_Query

*/

$args = array(
 'posts_per_page' => - 1,
 'orderby'        => 'title',
 'order'          => 'asc',
 'post_type'      => 'shop_coupon',
 'post_status'    => 'publish',

 'meta_query'    => array(
  array(
  'key'       => 'discount_type',
  'value'     => array('percent'),
  //'compare'   => 'IN',
  )
 )
);

$query = new WP_Query( $args );

//echo $query->request;

if ( $query->have_posts() ) {
 while ( $query->have_posts() ) {

 $query->the_post();

 print the_title();
 print the_excerpt();
 print the_permalink();

 }
}
wp_reset_postdata();
?>
