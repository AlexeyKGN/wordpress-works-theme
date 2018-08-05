<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title><?php bloginfo('name'); wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
<div class="head-wrapper">
    <div class="head">
        <div class="head-logo"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="" /></a></div>
        <div class="head-banner">
            <?php $banner = new WP_Query( array('post_type' => 'custom_banner', 'posts_per_page' => 1) ); ?>
            <?php if ($banner->have_posts()) :  while ($banner->have_posts()) : $banner->the_post(); ?>
                <?php the_post_thumbnail('full'); ?>
            <?php endwhile; ?>
            <?php else: ?>
                <h1><p>Place for banner 728Х90</p></h1>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="menu-wrapper">
    <div class="menu-main">
        <?php if(!dynamic_sidebar('menu_header')): ?>
            <span>Widget Menu Area</span>
        <?php endif; ?>
    
    
        <?php if ( ! dynamic_sidebar( 'social_header' ) ): ?>
            <ul class="ico-social">
                <span class="social_widget">Widget Social Links Area</span>
            </ul>
        <?php endif; ?>
    </div>
</div>