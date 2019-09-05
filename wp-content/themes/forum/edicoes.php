<?php /*Template Name: Edições Fórum do Futuro */ ?>
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
    <section class="section" id="temasArchive">
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

                        <div class="col-xs-12 col-md-12">
                            <div class="post wow fInLeft" data-wow-delay=".2s">
                                <figure>
                                    <?php echo get_the_post_thumbnail('', 'boxPrincial'); ?>
                                </figure>
                                <div class="desc">
                                    <div class="catgories">
                                        <?php the_category(', '); ?>
                                    </div>
                                    <h1><?php the_title(); ?></h1>
                                    <small>
                                        Autor: 
                                        <span>
                                            <a href="<?php echo $post_editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                        </span>
                                    </small> 
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="btn" style="margin-top:45px;display:inline-block;width:180px;">
                                        <i class="ion-plus-round"></i> Download
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
