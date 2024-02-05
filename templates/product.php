<?php /* Template Name: ProductPage */ ?>

<?php
/**
 *
 * @package mputer
 */

get_header();
?>
	<main id="primary" class="site-main">
            <?php while ( have_posts() ) :
			    the_post();
            endwhile;
			get_template_part( 'template-parts/content', 'page' );
            ?>
	</main><!-- #main -->
<?php
get_footer();