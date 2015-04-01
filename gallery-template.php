<?php

/*
Template Name: Gallery template
*/
?>
<?php while (have_posts()) : the_post(); ?>
	<div class="page-header">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div>

	<?php
	global $post;
	// Find all Gallery posts
	$args = array(
		'post_type'=> 'post',
		'post_status' => 'publish',
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-gallery' )
			)
		)
	);

	$galleries = get_posts( $args );
	foreach ( $galleries as $post ) {
		// do something here...
		setup_postdata( $post ); ?>
		<article <?php post_class(); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>

	<?php
	}
	wp_reset_postdata();

endwhile;
