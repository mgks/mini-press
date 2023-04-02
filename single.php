<?php
 
get_header();

while ( have_posts() ) : the_post();

    echo '<div class="container post-page">';

    if ( has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        echo '<img class="post-page-banner" src="' . $large_image_url[0] . '" />';
    }

    echo '<h2 class="post-page-headline"><a href="';
        the_permalink();
    echo '">';
        the_title();
    echo '</a></h2>';

    the_content();
    
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    echo '</div>';

    /*
    the_post_navigation( array(
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'mini-press' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Next post:', 'mini-press' ) . '</span> ' .
            '<span class="post-title">%title</span>',
        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'mini-press' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Previous post:', 'mini-press' ) . '</span> ' .
            '<span class="post-title">%title</span>',
    ) );
    */

endwhile;

get_footer(); ?>