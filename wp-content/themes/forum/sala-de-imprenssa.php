<?php /*Template Name: Sala de Imprenssa*/ ?>
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
    <section class="section" id="noticias">
        <div class="container boxPrincial"> 
        
            <?php
                $args = array(
                    'post_type' => 'agenda-noticia',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'destaque',
                            'compare' => '=',
                            'value' => '1'
                        )
                    )

                );

                $the_query = new WP_Query($args);

                if($the_query->have_posts()) :
                    while($the_query->have_posts()) : $the_query->the_post();

                    $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'boxPrincial' );
                    $image_src = $image_src_[0];
                    $the_excerpt = get_the_excerpt();
                    $editor = get_field('editor');

            ?>

               <div class="post wow fInLeft" data-wow-delay=".2s">
                    <div class="desc">
                        <div class="catgories">
                            <?php
                                $terms = get_the_terms( $post->ID, 'categoria_agenda_noticia' ); 
                                foreach($terms as $term) :

                                    $qtdt = count($terms); 
                            ?>
                                <?php
                                
                                    if($qtdt >= 2) :
                                ?>
                                    <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?>, </a>
                                    <?php else : ?>
                                    <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <small>
                            <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                            <span>
                                <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                            </span>
                        </small>
                        <p><?php echo $the_excerpt; ?></p>
                        <a href="<?php the_permalink(); ?>">
                            <i class="ion-plus-round"></i> Leia mais
                        </a>
                    </div>
                    <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                </div>
            
            <?php endwhile; else : ?>

            <p>Sem registros encontrados!</p>

        <?php endif; wp_reset_query(); ?>

        </div>
    </section>
    <div class="lastpostsAll">
        <div class="container">
            <div class="posts">
                <?php 

                    $args = array(
                        'post_type' => 'agenda-noticia',
                        'showposts' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'destaque_2',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();
                        $editor = get_field('editor');
                ?>

                    <div class="col-md-4">
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
                                    <?php
                                        $terms = get_the_terms( $post->ID, 'categoria_agenda_noticia' ); 
                                        foreach($terms as $term) :

                                            $qtdt = count($terms); 
                                    ?>
                                        <?php
                                        
                                            if($qtdt >= 2) :
                                        ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?>, </a>
                                            <?php else : ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                        
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                    </span>
                                </small> 
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <i class="ion-plus-round"></i> Leia mais
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; wp_reset_query(); ?>

                <?php 

                    $args = array(
                        'post_type' => 'agenda-noticia',
                        'showposts' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'destaque_3',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();
                        $editor = get_field('editor');
                ?>

                    <div class="col-md-4">
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
                                    <?php
                                        $terms = get_the_terms( $post->ID, 'categoria_agenda_noticia' ); 
                                        foreach($terms as $term) :

                                            $qtdt = count($terms); 
                                    ?>
                                        <?php
                                        
                                            if($qtdt >= 2) :
                                        ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?>, </a>
                                            <?php else : ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                        
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                    </span>
                                </small> 
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <i class="ion-plus-round"></i> Leia mais
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; wp_reset_query(); ?>

                <?php 

                    $args = array(
                        'post_type' => 'agenda-noticia',
                        'showposts' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'destaque_4',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )
                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();
                        $editor = get_field('editor');
                ?>

                    <div class="col-md-4">
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
                                    <?php
                                        $terms = get_the_terms( $post->ID, 'categoria_agenda_noticia' ); 
                                        foreach($terms as $term) :

                                            $qtdt = count($terms); 
                                    ?>
                                        <?php
                                        
                                            if($qtdt >= 2) :
                                        ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?>, </a>
                                            <?php else : ?>
                                            <a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                                        
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                    </span>
                                </small> 
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <i class="ion-plus-round"></i> Leia mais
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; wp_reset_query(); ?>

            </div>
        </div>
    </div>
    <section class="section" id="noticias">
        <div class="container midias"> 
    
                <?php

                    $totalVideos = 2;
                    $argsPods = array(
                        'post_type' => 'agenda-noticia',
                        // 'posts_per_page' => 2,
                        'categoria_agenda_noticia' => 'podcast',
                        'meta_query' => array(
                            array(
                                'key' => 'destaque_video',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )

                    );

                    $the_queryPods = new WP_Query($argsPods);

                    if($the_queryPods->have_posts())  {
                        $totalVideos = 1;
                    }

                    $args = array(
                        'post_type' => 'agenda-noticia',
                        'posts_per_page' => $totalVideos,
                        'categoria_agenda_noticia' => 'video',
                        'meta_query' => array(
                            array(
                                'key' => 'destaque_video',
                                'compare' => '=',
                                'value' => '1'
                            )
                        )

                    );

                    $the_query = new WP_Query($args);

                    if($the_query->have_posts()) :
                        while($the_query->have_posts()) : $the_query->the_post();
                        $editor = get_field('editor');

                        $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
                        $image_src = $image_src_[0];
                        $the_excerpt = get_the_excerpt();
                        $editor = get_field('editor');
                        $codigo_youtube = get_field('codigo_youtube');

                ?>
                <div class="col-md-6">
                    <h3><a href="<?php bloginfo('url'); ?>/?categoria_agenda_noticia=video">Vídeos</a></h3>
                    <div class="post wow fInLeft" data-wow-delay=".2s">
                        <?php if($codigo_youtube) : ?>
                            <div class='embed-container'><iframe src='https://www.youtube.com/embed/<?php echo $codigo_youtube; ?>' frameborder='0' allowfullscreen></iframe></div>
                        <?php else : ?>
                            <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                        <?php endif; ?>
                        <div class="desc">
                            <h1><?php the_title(); ?></h1>
                            <small>
                                <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                <span>
                                    <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                </span>
                            </small>
                            <p><?php echo $the_excerpt; ?></p>
                            <a href="<?php the_permalink(); ?>">
                                <i class="ion-plus-round"></i> Leia mais
                            </a>
                        </div>
                    </div>
                </div>
                
               <?php endwhile; else : ?>
                <p>Sem registros encontrados!</p>

                <?php endif; wp_reset_query(); ?>

            <?php
                $args = array(
                    'post_type' => 'agenda-noticia',
                    'posts_per_page' => 1,
                    'categoria_agenda_noticia' => 'podcast',
                    'meta_query' => array(
                        array(
                            'key' => 'destaque',
                            'compare' => '=',
                            'value' => '1'
                        )
                    )

                );

                $the_query = new WP_Query($args);

                if($the_query->have_posts()) : 
            ?>

                <div class="col-md-6">
                    <h3>Podcasts</h3>

                    <?php
                            while($the_query->have_posts()) : $the_query->the_post();

                            $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
                            $image_src = $image_src_[0];
                            $the_excerpt = get_the_excerpt();
                            $editor = get_field('editor');

                    ?>

                    <div class="post wow fInLeft" data-wow-delay=".2s">
                        <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                        <div class="desc">
                            <h1><?php the_title(); ?></h1>
                            <small>
                                <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                <span>
                                    <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
                                </span>
                            </small>
                            <p><?php echo $the_excerpt; ?></p>
                            <a href="<?php the_permalink(); ?>">
                                <i class="ion-plus-round"></i> Leia mais
                            </a>
                        </div>
                    </div>

                    <?php endwhile; ?>

                </div>
            </div>
        
        <?php endif; wp_reset_query(); ?>

    </section>

    <div class="lastpostsAll" id="trending">
        <div class="container">
            <h1><i class="ion-arrow-graph-up-right"></i> Trending</h1>
                <?php 

                    $args = array(
                        'post_type' => 'agenda-noticia',
                        'posts_per_page' => 3, 
                        'meta_key' => 'wpb_post_views_count', 
                        'orderby' => 'meta_value_num', 
                        'order' => 'DESC'  
                    );

                    $the_query = new WP_Query($args);
                    $published_posts = wp_count_posts()->publish;

                    wp_reset_query();
                ?>
                <div class="posts" id="loadPosts">
                    <div id="preloader">
                        <img src="<?php bloginfo('template_directory'); ?>/app/images/puff.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                    </div>
                    <div class="content"></div>
                    <div class="clearfix"></div>
                    <?php if($published_posts > 3) : ?>
                        <div id="more_posts" class="btn">Carregar Mais</div>
                    <?php endif; ?>

                    <!-- <div class="col-md-4">
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
                                    <?php
                                        $terms = get_the_terms( $post->ID, 'categoria_agenda_noticia' ); 
                                        foreach($terms as $term) {

                                            $qtdt = count($terms);

                                            if($qtdt >= 2) {
                                                echo "<a href='?categoria_agenda_noticia=$term->slug'>$term->name, </a>";
                                            }
                                            else {
                                                echo "<a href='?categoria_agenda_noticia=$term->slug'>$term->name</a>";
                                            }
                                        }
                                    ?>
                                </div>
                                <h1><?php the_title(); ?></h1>
                                <small>
                                    <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                                    <span>
                                        <?php echo $editor->post_title; ?>
                                    </span>
                                </small> 
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">
                                    <i class="ion-plus-round"></i> Leia mais
                                </a>
                            </div>
                        </div>
                    </div> -->

            </div>
        </div>
    </div>
    <section id="pl02"></section>
    <section class="section" id="sala-de-imprensa">
        <div class="container boxPrincial"> 
            <h1>Sala de Imprensa</h1> <br>
            <!-- <h3>Contato</h3> -->
            <div class="contacts">
                <?php 
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile; 
                    endif; 
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    <section class="section" id="nos-na-midia">
        <div class="container">
            <div class="col-md-12 title">
                <h1>Nós na mídia</h1>
            </div>
        </div>
        <div class="owl-carousel owl-theme owlmidia">
            <?php
                $args = array(
                    'post_type' => 'agenda-noticia',
                    'posts_per_page' => 300,
                    'categoria_agenda_noticia' => 'nos-na-midia'
                );

                $the_query = new WP_Query($args);

                if($the_query->have_posts()) :
                    while($the_query->have_posts()) : $the_query->the_post();

                    $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
                    $image_src = $image_src_[0];
            ?>

                <div class="box">
                    <a href="<?php the_permalink(); ?>">
                        <div class="desc">
                            <span><?php $fonte = get_field('fonte'); if($fonte) : echo $fonte; endif; ?></span>
                            <p><?php the_title(); ?></p>
                        </div>
                        <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                    </a>
                </div>

            
            <?php endwhile; else : ?>

                <div class="container">
                    <div class="col-md-12">
                        <p>Sem registros encontrados!</p>
                    </div>
                </div>

            <?php endif; wp_reset_query(); ?>
        </div>
    </section>
    <section class="section" id="banco-de-imagem">
        <div class="container">
            <div class="col-md-12 title">
                <h1>Banco de Imagem</h1>
            </div>
        </div>
        <?php
            $args = array(
                'post_type' => 'banco_de_imagem',
                'posts_per_page' => 24
            );

            $the_query = new WP_Query($args);

            if($the_query->have_posts()) :
                while($the_query->have_posts()) : $the_query->the_post();

                $image_src_ = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'tbPost' );
                $image_src = $image_src_[0];
        ?>

            <div class="col-md-3">
                <div class="box">
                    <a href="<?php $imagem_download = get_field('imagem_download'); if($imagem_download) : echo $imagem_download['sizes']['large']; else : echo 'javascript:void(0)'; endif; ?>" data-fancybox="banco" data-caption="<?php the_title(); ?>">
                        <!-- <div class="desc">
                            <span><?php the_title(); ?></span>
                            <p><?php echo(get_the_excerpt()); ?></p>
                        </div> -->
                        <figure style="background: #474747 url(<?php echo $image_src; ?>) no-repeat center center; background-size: cover;"></figure>
                    </a>
                </div>
            </div>
        
        <?php endwhile; else : ?>

            <div class="container">
                <div class="col-md-12">
                    <p>Sem registros encontrados!</p>
                </div>
            </div>

        <?php endif; wp_reset_query(); ?>

    </section>

<?php get_footer(); ?> 

<script>

    jQuery(function(jQuery) {

        var pageNumber = 3;
        var jQuerycontent = jQuery("#loadPosts .content");
        jQuery("#preloader").fadeIn('slow');

        countPosts = jQuerycontent.find('.post').length+3

        if(countPosts >= <?php echo $published_posts ?>) {
            jQuery('#more_posts').hide();
        }
        else {
            jQuery('#more_posts').show();
        }

        jQuery.ajax({
            type: "GET",
            dataType: "html",
            url: "<?php bloginfo('template_directory'); ?>/list-all-trending.php",
            beforeSend: function() {
                jQuerycontent.append();
            },
            success: function(data) {
                jQuerydata = jQuery(data);
                jQuerydata.hide();
                jQuerycontent.fadeIn('slow').append(jQuerydata);
                jQuerydata.fadeIn(function() {
                    jQuery("#preloader").fadeOut('slow');
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });

        jQuery("#preloader").fadeIn('slow');
        jQuerycontent.html('');

        // load more
        jQuery('#more_posts').on('click', function() {
            
            pageNumber+=3;

            countPosts = jQuerycontent.find('.post').length+3

            if(countPosts >= <?php echo $published_posts ?>) {
                jQuery('#more_posts').hide();
            }
            else {
                jQuery('#more_posts').show();
            }

            console.log(pageNumber);

                console.log(countPosts);

            var $content = jQuery("#loadPosts .content");
            jQuery("#preloader").fadeIn('slow');

            jQuery.ajax({
                type: "GET",
                data: {
                    pageNumber: pageNumber
                },
                dataType: "html",
                url: "<?php bloginfo('template_directory'); ?>/list-trendings.php",
                beforeSend: function() {},
                success: function(data) {
                    $data = jQuery(data);
                    $data.hide();
                    $content.fadeIn('slow').append($data);
                    $data.fadeIn(500, function() {
                        jQuery("#preloader").fadeOut('slow');
                    });;
                },
                error: function(jqXHR, texttema, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });

            jQuery("#preloader").fadeIn('slow');
            $content.html('').fadeOut('slow');

        });

    });
    
</script>
