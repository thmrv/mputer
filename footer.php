<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mputer
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="footer inner">
			<div class="footer products wrapper">
				<p class="footer entry title"><?= get_post_by_slug('footer_products', 'wpstring')->post_content ?></p>
				<?php 
				$entries = get_posts(
					[
						'post_type'      => 'wpproduct',
						'posts_per_page' => 100,
						'post_status'    => 'publish',
					]
				);
				foreach ($entries as $index => $entry): ?>
					<a href="#" class="footer entry"><?= $entry->post_content ?></a>
				<?php endforeach; ?>
			</div>
			<div class="footer solutions wrapper">
				<p class="footer entry title"><?= get_post_by_slug('footer_solutions', 'wpstring')->post_content ?></p>
				<?php 
				$entries = get_posts(
					[
						'post_type'      => 'wpsolution',
						'posts_per_page' => 100,
						'post_status'    => 'publish',
					]
				);
				foreach ($entries as $index => $entry): ?>
					<a href="#" class="footer entry"><?= $entry->post_content ?></a>
				<?php endforeach; ?>
			</div>
			<div class="footer training wrapper">
				<p class="footer entry title"><?= get_post_by_slug('footer_training', 'wpstring')->post_content ?></p>
				<?php 
				$entries = get_posts(
					[
						'post_type'      => 'wptraining',
						'posts_per_page' => 100,
						'post_status'    => 'publish',
					]
				);
				foreach ($entries as $index => $entry): ?>
					<a href="#" class="footer entry"><?= $entry->post_content ?></a>
				<?php endforeach; ?>
			</div>
			<div class="footer contacts wrapper">
				<p class="footer entry title"><?= get_post_by_slug('footer_contact_us', 'wpstring')->post_content ?></p>
				<?php 
				$entries = get_posts(
					[
						'post_type'      => 'wpcontact',
						'posts_per_page' => 100,
						'post_status'    => 'publish',
					]
				);
				foreach ($entries as $index => $entry): ?>
					<a href="#" class="footer entry"><?= $entry->post_content ?></a>
				<?php endforeach; ?>
			</div>
				</div>
		</div><!-- .site-info -->
		<div class="footer copyright wrapper">
			<div class="footer inner lower">
				<a href="#" class="footer entry"><?= get_post_by_slug('footer_copyright', 'wpstring')->post_content ?></a>
				<a href="#" class="footer entry link"><?= get_post_by_slug('footer_agreement', 'wpstring')->post_content ?></a>
				<a href="#" class="footer entry link"><?= get_post_by_slug('footer_policy', 'wpstring')->post_content ?></a>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
