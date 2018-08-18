<?php get_header(); ?>

<div class="page-title">
	<h1><?php single_cat_title(); ?></h1>
    <p class="page-title-map"><a href="<?php echo home_url(); ?>">Home</a>  /  <?php single_cat_title(); ?></p>
</div>

<?php

$cat_id = get_query_var('cat');
$tags = get_tags_in_cat($cat_id);

if($tags){
	echo '<div class="page-nav">';
		echo '<ul>';
			foreach($tags as $tag_id => $tag_name){
				echo '<li><a href="' . get_tag_link($tag_id) . '">' . $tag_name . '</a></li>';
			}
		echo '</ul>';
	echo '</div>';
}

?>

<?php if ( have_posts() ) : ?>

<div class="content-main">
<?php while ( have_posts() ) : the_post(); ?>

	<div class="artical-anons-main">
    	<?php the_post_thumbnail('full', array('class' => 'artical-img')); ?>
        <div class="artical-head">
        	<h1><?php the_title(); ?></h1>
            <?php my_list_tags(); ?>
        </div>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>" class="read-more">Read more</a></p>
    </div>

<?php endwhile; ?>

<?php wp_corenavi(); ?>

</div>
<?php else: ?>
	<div class="content-main">
		<p>В рубрике нет постов</p>
	</div>
<?php endif; ?>

<?php get_footer(); ?>