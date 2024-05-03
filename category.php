<?php
    get_header();
    echo '<div class="container">';
?>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
				<?php
				/* translators: %s: Category title. */
				printf( __( 'Category Archives: %s', 'mini_blog' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?>
				</h1>

			<?php if ( category_description() ) : // Show an optional category description. ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
                ?>
                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <?php 
           $the_content = wp_strip_all_tags(get_the_content());
           echo wp_trim_words($the_content, 50, '...');

            endwhile;
			?>

		<?php endif; ?>

<?php
    get_footer();
?>
