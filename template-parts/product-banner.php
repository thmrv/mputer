<?php
/**
 * Template part product trial banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mputer
 */

?>

<div class="banner wrapper trial with-background animate__animated animate__fadeIn">
    <div class="banner inner">
        <h3 class="banner heading">
            <?php global $post; $post ? $slug = $post->post_name : get_post_by_slug('func_standin', 'wpstring')->post_content ?>
            <?= keyword_replace(get_post_by_slug('product_banner_heading', 'wpstring')->post_content, $slug) ?>
        </h3>
        <div class="button grey bordered">
            <?= get_post_by_slug('download_trial', 'wpstring')->post_content ?>
        </div>
    </div>
</div>