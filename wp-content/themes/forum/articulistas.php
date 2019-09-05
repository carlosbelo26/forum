<?php /*Template Name: Articulistas*/ ?>
<?php get_header(); ?>
    
    <div id="slider">
        <div class="container">
            <div class="col-md-12">
                <div class="brds">
                    <strong>Você está em</strong> <?php the_breadcrumb_biblioteca(); ?>
                </div>
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
    <?php include'menubiblioteca.php'; ?>
    <section class="section" id="temas">
        <?php include'filtroArticulistas.php'; ?>
        <div class="container">

                <div class="boxes">

                    <?php 
                        $args = array(
                            'showposts' => 200,
                            'post_type' => 'editor',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'biblioteca',
                                    'compare' => '!=',
                                    'value' => '1'
                                )
                            )
                        );                       

                        $the_query = new WP_Query($args);

                        if($the_query->have_posts()) :
                            while($the_query->have_posts()) : $the_query->the_post();
                    ?>

                       <div class="col-md-4">
                            <div class="box wow blurFadeIn" data-wow-delay=".2s">
                                    <a href="<?php the_permalink(); ?>">
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
                                    </a>
                                </div>
                       </div>

                    <?php endwhile; endif; wp_reset_query(); ?>

                </div>
        </div>
        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                </ul>
            </div>
        </div>
    </section>

<?php get_footer(); ?> 
