<?php
/*
 * Template Name: Case Studies
 */
?>

<?php get_header(); ?>

<?php
// our loop array
$args = array( 'post_type' => 'case-studies', 'posts_per_page' => 6 );

// the loop called as an array
// http://codex.wordpress.org/Class_Reference/WP_Query
$loop = new WP_Query( $args );

if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop -> the_post(); ?>

<article class="case-study-item">
<header>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</header>

<div id="thumbnail">
<?php if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it. ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'case-study-thumb' ); ?></a>
<?php endif; ?> 
</div>

<div class="excerpt">
	<?php the_excerpt(); ?>
</div>
<!-- end/ .excerpt -->

</article>
<!-- end/ article -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
