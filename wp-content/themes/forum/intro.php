<?php /*Template Name: Intro*/ ?>
<?php get_header(); ?>

<style>
    header, footer, #newsletter {
        display: none;
    }
</style>

    <div id="videoBG" data-vide-bg="<?php bloginfo('template_directory'); ?>/app/images/video.mp4" data-vide-options="loop: true, muted: true, position: 50% 50%" onclick="javascript:location.href='<?php bloginfo('url'); ?>?page_id=10'">
        <!-- <div class="logo wow blurFadeIn" data-wow-delay=".5s">
            <a href="<?php bloginfo('url'); ?>?page_id=10">
                <img src="<?php bloginfo('template_directory'); ?>/app/images/logo.png" class="img-responsive logon" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
            </a>
        </div> -->
        <a href="<?php bloginfo('url'); ?>?page_id=10" class="wow blurFadeIn" data-wow-delay=".5s">
            Entre no site
        </a>
    </div>
        
<?php get_footer(); ?>