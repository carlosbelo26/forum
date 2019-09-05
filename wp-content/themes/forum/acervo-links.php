<?php /*Template Name: Acervo de Links*/ ?>
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
        <div class="container">
            <div class="postsLinks">
                <div class="col-md-3">
                    <aside>
                        <input type="text" name="s" id="getS" class="form-control" placeholder="Digite aqui sua pesquisa">
                        <h3>Categorias</h3>
                        <ul>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                            <li><a href="#">Alimentação</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <form id="filter" class="pull-right" onkeypress="return event.keyCode != 13;">
                            <div class="select">
                                <select class="form-control" name="tipo" id="getTipo">
                                    <option value="">Ordenar por:</option>
                                    <option value="">Mais recentes</option>
                                </select>
                            </div>    
                        </form>
                    </div>
                <?php 
                    $args = array(
                        'showposts' => 100,
                        'post_type' => 'links',
                        'categoria_link' => 'links'
                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();

                ?>

                    <div class="col-md-6">
                        <div class="links animated fInLeft" data-wow-delay=".2s">
                            <figure><img src="https://via.placeholder.com/300x150" class="img-responsive" alt=""></figure>
                            <div class="desc">
                                <div class="catgories">
                                    <h3><?php
                                        $terms = wp_get_post_terms( $post->ID, 'categoria_link' );

                                        foreach( $terms as $term){
                                            if($term->name != 'Links') {
                                                echo $term->name;
                                            }
                                        }
                                    ?></h3>
                                </div>
                                <a href="<?php $link = get_field('link'); if($link) : echo $link; else : echo 'javascript:void(0)'; endif; ?>" target="_blank">
                                    <h1><?php the_title(); ?></h1>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; // wp_reset_query(); ?> 
                </div>

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
