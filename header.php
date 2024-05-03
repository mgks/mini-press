<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'main-header' ) );
?>
    </header> 
