<?php 
    get_header(); 
    query_posts('page_id=241'); 
    while (have_posts ()): the_post(); 
?>
    
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

<?php endwhile; wp_reset_query(); ?>

    <div class="clearfix"></div>
    <section class="section" id="projetos">
        <div class="container">
            
        
            <?php
                global $wp_query;
                $args = array_merge( $wp_query->query_vars, array( 'meta_key' => 'status', 'meta_value' => 'em-andamento' ) );
                query_posts( $args );

                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();

                    $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
                    $image_src = $image_src_[0];
            ?>

                <div class="col-md-6">
                    <div class="box">
                        <a href="<?php the_permalink(); ?>">
                            <div class="desc">
                                <span><?php the_title(); ?></span>
                                <p><?php echo(get_the_excerpt()); ?></p>
                            </div>
                            <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                        </a>
                    </div>
                </div>
            
            <?php 
                endwhile; 
                endif; 
                wp_reset_query();
            ?>

        </div>
    </section>

    <?php
        global $wp_query;
        $args = array_merge( $wp_query->query_vars, array( 'meta_key' => 'status', 'meta_value' => 'finalizados' ) );
        query_posts( $args );

        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

            $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
            $image_src = $image_src_[0];
            
    ?>
    
        <section class="section" id="projetosFinalizados">
            <div class="container">
                <div class="col-md-12">
                    <h1>Finalizados</h1>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <a href="<?php the_permalink(); ?>">
                            <div class="desc">
                                <span><?php the_title(); ?></span>
                                <p><?php echo(get_the_excerpt()); ?></p>
                            </div>
                            <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    <?php 
        endwhile; 
        endif; 
        wp_reset_query();
    ?>

<?php get_footer(); ?> 