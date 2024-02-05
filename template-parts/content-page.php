<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mputer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" style="background-image:url(<?= get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>)">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?= get_post_by_slug('upper', 'page-part')->post_content ?>
	</div>
	<?php get_template_part( 'template-parts/relevant-articles'); ?>
	<?= get_post_by_slug('scheme', 'page-part')->post_content ?>
	<div class="entry-content">
		<?= get_post_by_slug('middle', 'page-part')->post_content ?>
	</div>
	<?= get_post_by_slug('lower', 'page-part')->post_content ?>
	<?php get_template_part( 'template-parts/product-banner'); ?>
	<!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
