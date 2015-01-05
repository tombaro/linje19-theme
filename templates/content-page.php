<?php if ( ! post_password_required() && ! is_attachment() ) : the_post_thumbnail(); endif; ?>
<?php the_content(); ?>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>