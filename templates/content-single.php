<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
	<header>
	  <h1 class="entry-title"><?php the_title(); ?></h1>
	  <?php if ( ! post_password_required() && ! is_attachment() ) : the_post_thumbnail(); endif; ?>
	  <p><?php get_template_part('templates/entry-meta'); ?></p>
	</header>
	<div class="entry-content">
	  <?php the_content(); ?>
	</div>
	<?php

	  //for use in the loop, list 5 post titles related to first tag on current post

	  $tags = wp_get_post_tags($post->ID);

	  if ($tags) {

			echo '<h3>Liknande inlägg</h3>';
			echo '<div class="container related-posts">';

			$first_tag = $tags[0]->term_id;

			$args=array(

				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'posts_per_page' => 4,
				'ignore_sticky_posts' => 1
			);

			$my_query = new WP_Query($args);

			if( $my_query->have_posts() ) {

				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					
						<div class="col-md-3">
							<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( array(150, 150) ); ?></a>
							<br />
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</div>					

				<?php
				endwhile;
			}

			wp_reset_query();

			echo '</div>';

		}
	?>

	<footer>
	  <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
	</footer>
	<?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
