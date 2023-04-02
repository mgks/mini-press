<?php

get_header();

echo '<div class="container">';
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>

<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<?php 
           $the_content = wp_strip_all_tags(get_the_content());
           echo wp_trim_words($the_content, 50, '...');
        ?>
	
	<?php endwhile;

else :
	echo '<p>There are no posts!</p>';

endif;

echo '</div>';

get_footer();

?>