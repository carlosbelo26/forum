<?php /*Template Name: Quem Somos*/ ?>
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
    <section class="section" id="page" style="padding-top:0;">
        <div class="container">
            <div class="col-md-6">
                <?php $quem_somos_1 = get_field('quem_somos_1'); if($quem_somos_1) : echo $quem_somos_1; endif; ?>
            </div>
            <div class="col-md-6">
                <?php $quem_somos_2 = get_field('quem_somos_2'); if($quem_somos_2) : echo $quem_somos_2; endif; ?>
            </div>
        </div>
    </section>
    <section id="pl03"></section>
    <section class="section" id="quemfaz">
        <div class="container">
            <div class="container">
                <div class="wow fInLeft">
                    <div class="col-md-12 title">
                        <h1>Quem Faz</h1>
                    </div>
                    <div class="col-md-8 col-md-offset-2 assinaturaT">
                        <?php $assinatura_quem_faz = get_field('assinatura_quem_faz'); if($assinatura_quem_faz) : ?>
                            <h2>
                                <?php echo $assinatura_quem_faz; ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="boxes">

                    <?php 
                        $args = array(
                            'showposts' => 200,
                            'post_type' => 'editor',
                            'orderby'=> 'title', 
                            'order' => 'ASC',
                            'post__not_in' => array(353),
                            // 'meta_query' => array(
                            //     array(
                            //         'key' => 'biblioteca',
                            //         'compare' => '!=',
                            //         'value' => '1'
                            //     )
                            // )
                        );

                        $the_query = new WP_Query($args);

                        if($the_query->have_posts()) :
                            while($the_query->have_posts()) : $the_query->the_post();
                    ?>

                        <div class="box wow blurFadeIn" data-wow-delay=".2s">
                            <a href="<?php the_permalink(); ?>">
                                <figure>
                                    <figure>
                                        <?php
                                            if (has_post_thumbnail()) { 
                                                the_post_thumbnail('tbP'); 
                                            }
                                        ?>
                                    </figure>
                                </figure>
                            </a>
                        </div>

                    <?php endwhile; endif; wp_reset_query(); ?>

                </div>
            </div>
        </div>
    </section>
    <section class="section" id="quemapoia">
        <div class="container">
            <div class="wow fInLeft">
                <div class="col-md-12 title">
                    <h1>Quem Apoia</h1>
                </div>                
                <div class="col-md-8 col-md-offset-2 assinaturaT">
                    <?php $assinatura_quem_apoia = get_field('assinatura_quem_apoia'); if($assinatura_quem_apoia) : ?>
                        <h2>
                            <?php echo $assinatura_quem_apoia; ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="boxes">

                <?php 
                
                    if( have_rows('quem_apoia') ) : while( have_rows('quem_apoia') ) : the_row(); 
                    
                        $logo = get_sub_field('logo');
                        $link = get_sub_field('link');
                    
                ?>

                    <div class="box wow blurFadeIn" data-wow-delay=".2s">
                        <figure>
                            <a href="<?php if($link) : echo $link; else : echo 'javascript:void(0)'; endif;?>" target="_blank">
                                <img src="<?php echo $logo; ?>" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                            </a>
                        </figure>
                    </div>

                <?php endwhile; endif; ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?> 