<?php 
    get_header(); 
    
    if ( have_posts() ) : while ( have_posts() ) : the_post();    

    $term_list = wp_get_post_terms($post->ID, 'tipos');

    if ($term_list[0]->slug == 'livros'){
        $image_src = get_template_directory_uri()."/app/images/toplivros.jpg";
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
                    <strong>Você está em</strong> <?php the_breadcrumb_biblioteca(); ?>
                </div>

                        <?php
                            $editor = get_field('editor');
                            if( $editor ): 
                                $post_editor = $editor;
                                setup_postdata( $post_editor ); 
                            wp_reset_postdata(); endif; 
                        ?>

                        <div class="col-md-7 col-md-offset-2"> 
                            <div class="t">
                                <div class="catgories">
                                    <!-- <span>Categoria: </span> -->
                                    <?php the_category(', '); ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <h2><?php $subtitulo = get_field('subtitulo'); if($subtitulo) : echo $subtitulo; endif; ?></h2>
                                <small>
                                    <?php if($term_list[0]->slug != 'livros') : ?>
                                        <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <?php endif; ?>
                                    <span>
                                        <a href="<?php echo $post_editor->guid; ?>">
                                            <?php echo $post_editor->post_title; ?>
                                        </a>
                                    </span>
                                    <span class="timeL">
                                        <?php $tempo_de_leitura = get_field('tempo_de_leitura'); if($tempo_de_leitura) : echo $tempo_de_leitura; endif; ?>
                                    </span>
                                </small> 
                                <div class="bookInfo">
                                    <?php $editora = get_field('editora'); if($editora) : echo '<strong>Editora:</strong> ' .$editora. ' | '; endif; $ano = get_field('ano'); if($ano) : echo '<strong>Ano:</strong> ' .$ano. ' | '; endif;  $pagina = get_field('pagina'); if($pagina) : echo '<strong>Página:</strong> ' .$pagina; endif; ?>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1 innerpost">
                            <?php the_content();?>
                            <div class="clearfix"></div>
                                <div class="theTags">
                                <?php 
                                    $post_tags = get_the_tags();
                                    if ( $post_tags ) :
                                ?>
                                <span>TAGS:</span>
                                <?php
                                    foreach( $post_tags as $tag ) : 
                                ?>
                                    <a href="<?php bloginfo('url'); ?>/?tag=<?php echo $tag->slug; ?>">
                                        <?php echo $tag->name . ', '; ?>
                                    </a>
                                <?php endforeach; endif; ?>

                            </div>
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
                                    <a href="<?php bloginfo('url'); ?>/?page_id=12&autor=<?php echo $post_editor->ID; ?>&tipo=26" data-tooltip="Artigos" class="bo tooltip-bottom" style="padding-left: 6px;">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/5.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="<?php bloginfo('url'); ?>/?page_id=12&autor=<?php echo $post_editor->ID; ?>&tipo=29" data-tooltip="Livros" class="bo tooltip-bottom">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/1.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="<?php bloginfo('url'); ?>/?page_id=12&autor=<?php echo $post_editor->ID; ?>&tipo=30" data-tooltip="Papers" class="bo tooltip-bottom">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/4.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="<?php bloginfo('url'); ?>/?page_id=12&autor=<?php echo $post_editor->ID; ?>&tipo=27" data-tooltip="Podcasts" class="bo tooltip-bottom">
                                        <img src="<?php bloginfo('template_directory'); ?>/app/images/3.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                                    </a>
                                    <a href="<?php bloginfo('url'); ?>/?page_id=12&autor=<?php echo $post_editor->ID; ?>&tipo=28" data-tooltip="Vídeo" class="bo tooltip-bottom">
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
    <div class="clearfix"></div>
    <div class="lastpostsAll">
        <div class="container">
            <h1>Leia também</h1>
            <div class="posts">
                <?php 

                    $args = array(
                        'showposts' => 3,
                        'orderby'   =>'rand',
                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();

                        $editor = get_field('editor'); 
                ?>

                    <div class="col-xs-12 col-md-4">
                        <div class="post wow fInLeft" data-wow-delay=".2s">
                            <figure>
                                <?php
                                    if (has_post_thumbnail()) { 
                                        the_post_thumbnail('tbP'); 
                                    }
                                ?>
                            </figure>
                            <div class="desc">
                                <div class="catgories">
                                    <?php the_category(', '); ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <a href="<?php echo $editor->guid; ?>">
                                            <?php echo $editor->post_title; ?>
                                        </a>
                                    </span>
                                </small> 
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <i class="ion-plus-round"></i> Leia mais
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; else : ?>

                    <p>Sem registros encontrados!</p>

                <?php endif; wp_reset_query(); ?>

            </div>
        </div>
    </div>
        
<?php get_footer(); ?>