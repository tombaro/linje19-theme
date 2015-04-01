<article <?php post_class(); ?>>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'templates/entry-meta' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="btn btn-info">
		<a href="<?php echo home_url( '/media/bilder/' ); ?>">Se alla bilder <span class="glyphicon glyphicon-circle-arrow-right"></a>
	</div>
</article>
