<?php get_header(); ?>
    
    <div id="slider">
        <div class="container">
            <div class="col-md-12">
                <h1 class="wow fInLeft" data-wow-delay=".2s"><?php the_title(); ?></h1>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <?php $assinatura = get_field('assinatura'); if($assinatura) : ?>
                    <h2 class="wow fInLeft" data-wow-delay=".4s">
                        <?php echo $assinatura; ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section class="section" id="page">
        <div class="container">
            <div class="col-md-12">
                <?php 
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?> 