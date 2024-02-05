<?php
/**
 * Template part relevant articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mputer
 */

?>

<div class="articles wrapper">
    <div class="articles inner">
        <?php
        $entries = get_posts(
            [
                'post_type' => 'wparticle',
                'posts_per_page' => 100,
                'post_status' => 'publish',
            ]
        );
        foreach ($entries as $entry): ?>
            <?php $image = has_post_thumbnail($entry->ID) ? wp_get_attachment_image_src(get_post_thumbnail_id($entry->ID), 'single-post-thumbnail')[0] : 'https://www.tlbx.app/200.svg' ?>
            <div class="article wrapper animate__animated animate__fadeIn">
                <div class="article image wrapper"><img src="<?= $image ?>" class="article img"></div>
                <h3 class="article title">
                    <?= $entry->post_title ?>
                </h3>
                <p class="article description">
                    <?= $entry->post_content ?>
                </p>
                <a href="#" class="article read-more">
                    <?= get_post_by_slug('read_more', 'wpstring')->post_content ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>