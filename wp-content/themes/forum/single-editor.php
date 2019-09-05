<?php 
    get_header(); 
    
    if ( have_posts() ) : while ( have_posts() ) : the_post(); $autorID = get_the_ID(); 
?>

    <div id="slider">
        <div class="container">
            <div class="col-md-12">
                <div class="brds">
                    <strong>Você está em</strong> <?php the_breadcrumb_autor(); ?>
                </div>
                <h1 class="wow fInLeft" data-wow-delay=".2s">Articulistas</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php include'menubiblioteca.php'; ?>
    <section class="section" id="temas">
        <?php include'filtroArticulistas.php'; ?>
        <div class="container">
            <div class="boxes">
                <div class="box wow blurFadeIn" data-wow-delay=".2s">
                    <figure>
                        <?php
                            if (has_post_thumbnail()) { 
                                the_post_thumbnail('tbP'); 
                            }
                        ?>
                    </figure>
                    <div class="txt">
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
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
            </div>    
        </div>
        <div class="container">
            <div class="col-md-10 col-md-offset-1 innerpost">
                <?php $texto_do_perfil = get_field('texto_do_perfil'); if($texto_do_perfil) : echo $texto_do_perfil; endif; ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="lastpostsAll">
            <div class="container">
            <form id="filter" onkeypress="return event.keyCode != 13;">
                <div class="col-md-6">
                    <div class="select">
                        <select class="form-control" name="tipo" id="getTipo">
                            <option value="">Ordenar por:</option>
                            <option value="">Mais recentes</option>
                        </select>
                    </div>
                </div>           
                <div class="col-md-6">
                    <div class="select">
                        <select class="form-control" name="tipo" id="getTipo">
                            <option value="">Ordenar por tipo de Mídia</option>
                            
                            <?php
                                $tipos = get_terms([
                                    'taxonomy' => 'tipos',
                                    'hide_empty' => false,
                                    'orderby' => 'name', 
                                    'order' => 'ASC'
                                    
                                ]);
                                
                                if ($tipos) :
                                    foreach($tipos as $tipos_) :
                            ?>
                                
                                <option value="<?php echo $tipos_->slug; ?>"><?php echo $tipos_->name; ?></option>
                            
                            <?php endforeach; endif; ?>

                        </select>
                    </div>
                </div>

            </form>
                <div class="posts">
                    <?php 
                        $args = array(
                            'showposts' => 3,
                            'meta_key' => 'editor',
                            'meta_value' =>  $autorID
                        );

                        $the_query = new WP_Query($args);

                        if($the_query->have_posts()) :
                            while($the_query->have_posts()) : $the_query->the_post();

                            $editor = get_field('editor');
                    ?>

                        <div class="col-xs-12 col-md-6">
                            <div class="post wow fInLeft" data-wow-delay=".2s">
                                <figure>
                                    <?php echo get_the_post_thumbnail('', 'tbP'); ?>
                                </figure>
                                <div class="desc">
                                    <div class="catgories">
                                        <?php the_category(', '); ?>
                                    </div>
                                    <h1><?php the_title(); ?></h1>
                                    <small>
                                        <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                        <span>
                                            <a href="<?php echo $post_editor->guid; ?>"><?php echo $editor->post_title; ?></a>
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
    </section>

<?php endwhile; else : endif; ?>
<?php get_footer(); ?> 
