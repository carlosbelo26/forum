<?php
/**
 * @version $Revision$
 * @author $Author$
 * @since $Date$
 */

get_header(); ?>
<style> 
    #newsletter { 
        display: none; 
    }
    .forum-slider-text-content {
        background: none!important;
        text-transform: none!important;
        font-size: 18px!important;
        font-weight: normal!important;
        padding: 0!important;
        margin-top: -5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }
    .forum-slider-text-author {
        background: none!important;
        padding: 0!important;
        text-transform: none!important;
        font-weight: normal!important;
        overflow: hidden;
        white-space: nowrap;
        margin-top: -10px;
        font-size: 14px!important;
    }
</style>
<div id="slider">
    <div class="grid-container">
        <div class="box area-a wow blurFadeIn" data-wow-delay=".2s">
            <div class="owl-carousel owl-theme owlagendas">
            <?php
                $query = new WP_Query([
                    'post_type'      => [ 'agenda-noticia', 'links', 'post' ],
//                    'posts_per_page' => 1,
                    'meta_query'     => [ 
                        [ 'key' => 'destaque', 'compare' => '=', 'value'   => '1' ] 
                    ]
                ]);
                if ($query->have_posts()) { 
                    while($query->have_posts()) {
                        $query->the_post();
                        
                        $image_src_ = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'boxPrincial');
                        $image_src = $image_src_[0];
                        $the_excerpt = get_the_excerpt();
                        $editor = get_field('editor');                         
                        $author_id = $post->post_author;
                        
                        $detach = [
                            'agenda-noticia' => 'Notícias',
                            'links'          => 'links',
                            'post'           => 'Biblioteca'
                        ];
                    ?>                        
                        <a href="<?php the_permalink(); ?>">
                            <div class="desc" style="padding-left: 20px; width: 80%;">
                                <!--<span style="border-radius: 40px; width: auto; text-align: center;"><?php echo $detach[$post->post_type]; ?></span>-->
                                <span style="background: none; text-transform: none; font-size: 25px; display: block;"><?php the_title(); ?></span>
                                <?php if ($post->post_content): ?>
                                    <span class="forum-slider-text-content"><?php echo wp_filter_nohtml_kses($post->post_content); ?></span>
                                <?php endif; ?>
                                <span class="forum-slider-text-author"><?php echo date('d/m/Y', strtotime($post->post_date)); ?> - <?php echo the_author_meta( 'display_name' , $author_id ); ?></span>
                            </div>
                            <figure style="background: #000 url(<?php echo $image_src; ?>) no-repeat center center;background-size: cover;"></figure>
                        </a> 
                    <?php
                    }
                }
                wp_reset_query(); 
            ?>
            </div>
        </div>

            <?php 
                
                if( have_rows('biblioteca') ) : while( have_rows('biblioteca') ): the_row(); 
                    
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                    $imagem = get_sub_field('imagem');
                    
                ?>

                    <div class="box area-b wow blurFadeIn" data-wow-delay=".4s">
                        <a href="<?php bloginfo('url'); ?>/?page_id=12">
                            <div class="desc">
                                <span><?php echo $titulo; ?></span>
                                <?php echo $texto; ?>
                            </div>
                            <figure style="background: #000 url(<?php echo $imagem; ?>) no-repeat center center;background-size: cover;"></figure>
                        </a>
                    </div>
                    
            <?php endwhile; endif; ?>

            <?php 
                
                if( have_rows('projeto_biomas') ) : while( have_rows('projeto_biomas') ): the_row(); 
                    
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                    $imagem = get_sub_field('imagem');
                    
                ?>

                    <div class="box area-c wow blurFadeIn" data-wow-delay=".4s">
                        <a href="<?php bloginfo('url'); ?>/?projeto=biomas-tropicais">
                            <div class="desc" style="height: 60px;">
                                <span style="background: none; text-transform: none;"><?php echo $titulo; ?></span>
                                <?php // echo $texto; ?>
                            </div>
                            <figure style="background: #000 url(<?php echo $imagem; ?>) no-repeat center center;background-size: cover;"></figure>
                        </a>
                    </div>
                    
            <?php endwhile; endif; ?>

            <?php 
                
                if( have_rows('plataforma_do_conhecimento') ) : while( have_rows('plataforma_do_conhecimento') ): the_row(); 
                    
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                    $imagem = get_sub_field('imagem');
                    
                ?>

                    <div class="box area-d wow blurFadeIn" data-wow-delay=".4s">
                        <a href="<?php bloginfo('url'); ?>/?projeto=plataforma-do-conhecimento">
                            <div class="desc" style="height: 60px;">
                                <span style="background: none; text-transform: none;"><?php echo $titulo; ?></span>
                                <?php // echo $texto; ?>
                            </div>
                            <figure style="background: #000 url(<?php echo $imagem; ?>) no-repeat center center;background-size: cover;"></figure>
                        </a>
                    </div>
                    
            <?php endwhile; endif; ?>

            <?php 
                
                if( have_rows('debate') ) : while( have_rows('debate') ): the_row(); 
                    
                    $titulo = get_sub_field('titulo');
                    $texto = get_sub_field('texto');
                    $imagem = get_sub_field('imagem');
                    
                ?>

                    <div class="box area-e wow blurFadeIn" data-wow-delay=".4s">
                        <a href="<?php bloginfo('url'); ?>/?page_id=189">
                            <div class="desc" style="height: 60px;">
                                <span style="background: none; text-transform: none;"><?php echo $titulo; ?></span>
                                <?php // echo $texto; ?>
                            </div>
                            <figure style="background: #000 url(<?php echo $imagem; ?>) no-repeat center center;background-size: cover;"></figure>
                        </a>
                    </div>
                    
            <?php endwhile; endif; ?>

            
            <div class="box area-f wow blurFadeIn" data-wow-delay=".4s">
                <a href="<?php bloginfo('url'); ?>/?page_id=3013" class="icos">
                    <!-- <span>Biblioteca</span> -->
                    <i class="fa fa-users"></i>
                    <strong> Articulistas</strong>
                </a>
                <a href="<?php bloginfo('url'); ?>/?page_id=3015" class="icos">
                    <i class="fa fa-link"></i>
                    <strong> Acervo de Links</strong>
                </a>
                <a href="<?php bloginfo('url'); ?>/?page_id=3018" class="icos">
                    <i class="fa fa-edit"></i>
                    <strong> Edições Fórum do Futuro</strong>
                </a>
                <a href="<?php bloginfo('url'); ?>/?page_id=3020" class="icos">
                    <i class="fa fa-book"></i>
                    <strong>Livros de Papers Favoritos</strong>
                </a>
                <a href="<?php bloginfo('url'); ?>/?page_id=189" class="icos">
                    <i class="fa fa-star"></i>
                    <strong> Temas em Destaque</strong>
                </a>
            </div>
        </div>
    </div>
    <section class="section" id="quemapoiaH">
        <div class="container">
            <div class="wow fInLeft">
                <div class="col-md-12">
                    <h1>Incentivadores</h1>
                </div>
                <div class="col-md-8 col-md-offset-2 assinaturaT">
                    <?php $assinatura = get_field('assinatura'); if($assinatura) : ?>
                        <h2>
                            <?php echo $assinatura; ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="boxes">

                <?php 

                    query_posts('page_id=569'); 
                    while (have_posts ()): the_post(); 

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

                <?php 
                        endwhile; endif; 
                    endwhile;
                    wp_reset_query();
                ?>

            </div>
        </div>
    </section>
    <?php if( have_rows('depoimentos') ) : ?>
    <section class="section" id="depoimentos">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 wow fInLeft">
                <div class="owl-carousel owl-theme">

                    <?php 
                
                        while( have_rows('depoimentos') ) : the_row(); 
                        
                            $texto = get_sub_field('texto');
                        
                    ?>

                        <div class="depoimento">
                            <i class="ion-quote"></i>
                            <?php echo $texto; ?>
                        </div>
                        
                    <?php endwhile; ?>

                
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <div class="clearfix"></div>
    <section class="section" id="newsletterUp" data-stellar-vertical-offset="250" data-stellar-background-ratio="0.9">
        <div class="container">
            <div class="col-md-6 wow fInLeft">
                <?php 
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
                    wp_reset_query();
                ?>
            </div>
            <div class="col-md-4 pull-right">
                <div class="btns wow fInLeft" data-wow-delay=".2s">
                    <a href="http://eepurl.com/dKMnT6" target="_blank" class="btn">inscreva-se</a>
                    <a href="http://eepurl.com/dKMnT6" target="_blank" class="rss">
                        <i class="ion-social-rss"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
        
<?php get_footer(); ?>