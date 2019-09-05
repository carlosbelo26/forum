<?php 
    get_header(); 
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();    

    $term_list = wp_get_post_terms($post->ID, 'tipos');

    if ($term_list[0]->slug == 'livros'){
        $image_src = get_template_directory_uri()."/app/images/topautor.jpg";
    }
    else {
        $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
        $image_src = $image_src_[0];
    }

?>

    <div class="section" id="blog" style="padding-top:0;">
        <div class="fullbanner" style="background:#f5f5f5 url('<?php echo $image_src; ?>') no-repeat 0 0; background-size: cover;" data-stellar-background-ratio=".9"></div>
        <div class="container">
            <div class="single animated fadeIn" data-wow-delay="0.5s">
                <div class="singn">
                    <small><?php $assintaura = get_field('assintaura'); if($assintaura) : echo $assintaura; endif; ?></small>
                </div>
                <div class="brds">
                    <strong>Você está em</strong> <?php the_breadcrumb_projetos(); ?>
                </div>

                        <?php

                            $editor = get_field('editor');

                            if( $editor ): 

                                // override $post
                                $post_editor = $editor;
                                setup_postdata( $post_editor ); 

                            wp_reset_postdata(); endif; 
                        
                        ?>

                        <div class="col-xs-12 col-md-7 col-md-offset-2 single-projetos"> 
                            <div class="t">
                                <!-- <div class="catgories">
                                    <span>Categoria: </span>
                                    <?php the_category(); ?>
                                </div> -->
                                <h1><?php the_title(); ?></h1>
                                <h2><?php $subtitulo = get_field('subtitulo'); if($subtitulo) : echo $subtitulo; endif; ?></h2>
                                <!-- <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <a href="#">
                                            <?php echo $post_editor->post_title; ?>
                                        </a>
                                    </span>
                                    <span class="timeL">
                                        <?php $tempo_de_leitura = get_field('tempo_de_leitura'); if($tempo_de_leitura) : echo $tempo_de_leitura; endif; ?>
                                    </span>
                                </small> 
                                <div class="bookInfo">
                                    <?php $editora = get_field('editora'); if($editora) : echo '<strong>Editora:</strong> ' .$editora. ' | '; endif; $ano = get_field('ano'); if($ano) : echo '<strong>Ano:</strong> ' .$ano. ' | '; endif;  $pagina = get_field('pagina'); if($pagina) : echo '<strong>Página:</strong> ' .$pagina; endif; ?>
                                </div>  -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1 innerpost">
                            <?php the_content();?>
                        </div>
                        
                    <?php endwhile; else : ?>

                       <p>Sem registros encontrados!</p>

                    <?php endif; ?>
                    
            </div>

            <?php if($post_editor) : ?>
            
                <div class="col-xs-12 col-md-8 col-md-offset-2"> 
                    <a href="<?php echo $post_editor->guid; ?>">
                        <div class="about wow fInLeft" data-wow-delay=".4s">
                            <figure>
                                <?php echo get_the_post_thumbnail($post_editor->ID, 'tbP'); ?>
                            </figure>
                            <div class="txt">
                                <h3><?php echo $post_editor->post_title; ?></h3> 
                                <p><?php echo $post_editor->post_content; ?></p>
                                <div class="listItems">
                                    <a href="javascript:void(0);" data-tooltip="Artigos" class="bo tooltip-bottom" style="padding-left: 6px;" data-autor="<?php the_ID(); ?>" data-tipo="26">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/5.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="javascript:void(0);" data-tooltip="Livros" class="bo tooltip-bottom" data-autor="<?php the_ID(); ?>" data-tipo="29">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/1.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="javascript:void(0);" data-tooltip="Papers" class="bo tooltip-bottom" data-autor="<?php the_ID(); ?>" data-tipo="30">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/4.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="javascript:void(0);" data-tooltip="Podcasts" class="bo tooltip-bottom" data-autor="<?php the_ID(); ?>" data-tipo="27">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/3.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="javascript:void(0);" data-tooltip="Vídeo" class="bo tooltip-bottom" data-autor="<?php the_ID(); ?>" data-tipo="28">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/2.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            
            <?php endif; ?>

        </div>
    </div>
        
<?php get_footer(); ?>