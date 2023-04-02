<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <h1><?php the_custom_logo(); ?></h1>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'main-header' ) );
?>
    </header> 
