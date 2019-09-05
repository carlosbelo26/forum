<?php /*Template Name: Bilioteca*/ ?>
<?php get_header(); ?>
    
    <div id="slider">
        <div class="container">
            <div class="col-md-12">
                <div class="brds">
                    <strong>Você está em</strong> <?php the_breadcrumb_biblioteca_(); ?>
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
        <div class="container bibliotecaicos">
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
    </section>

<?php get_footer(); ?> 
