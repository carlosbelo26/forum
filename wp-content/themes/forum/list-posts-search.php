<?php

    require_once('../../../wp-load.php');
        
        $s = (isset($_GET['s'])) ? $_GET['s'] : '';
        $tema = (isset($_GET['tema'])) ? $_GET['tema'] : '';
        $autor = (isset($_GET['autor'])) ? $_GET['autor'] : '';
        $tipo = (isset($_GET['tipo'])) ? $_GET['tipo'] : '';
        $tipoC = (isset($_GET['tipoC'])) ? $_GET['tipoC'] : '';
        $tipoTemrms = get_term_by( 'id', absint( $tipoC ), 'tipos' ); 
        $tipos = $tipoTemrms->name;

        if ($tipoC) {
            $tipo = $tipos;
        }

        $pageNumber = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 10;

        if ($autor) {
            $args_ = array(
                'post_type' => 'editor'
            );

        $the_query_ = new WP_Query($args_);

        if($the_query_->have_posts()) :
            while($the_query_->have_posts()) : $the_query_->the_post();

            $autorName = get_the_title($autor);

            endwhile; endif; wp_reset_query();
        }
?>

    <?php if($tema || $autorName || $tipos) : ?>
        <div class="searchresults">
            <h3><strong>Sua busca para:</strong> <?php if($s){echo $s. ' / ';} ?><?php echo get_cat_name($tema); ?> <?php if($autorName){echo ' / '.$autorName;} ?> <?php if($tipos){echo ' / '.$tipos;} ?> </h3>
        </div>
    <?php endif; ?>

<?php
        $args = array(
          "s" => $s,
          'cat' => $tema,
          'meta_key' => 'editor',
          'meta_value' => $autor,
          'tipos' => $tipo,
          'posts_per_page' => 300,
          'post_type' => 'post'
        );

        $the_query = new WP_Query($args);

        if($the_query->have_posts()) :
            while($the_query->have_posts()) : $the_query->the_post();

            $the_excerpt = get_the_excerpt();

            $editor = get_field('editor');

            $term_list = wp_get_post_terms($post->ID, 'tipos');

            if( $editor ): 

                // override $post
                $post_editor = $editor;
                setup_postdata( $post_editor ); 

            wp_reset_postdata(); endif; 

    ?>

        <div class="post animated fInLeft" data-wow-delay=".2s">
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
                    <?php if($term_list[0]->slug != 'livros') : ?>
                        <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> | 
                    <?php endif; ?> 
                    <span>
                        <a href="<?php echo $post_editor->guid; ?>"><?php echo $post_editor->post_title; ?></a>
                    </span>
                </small> 
                <div class="bookInfo">
                    <?php $editora = get_field('editora'); if($editora) : echo '<strong>Editora:</strong> ' .$editora. ' | '; endif; $ano = get_field('ano'); if($ano) : echo '<strong>Ano:</strong> ' .$ano. ' | '; endif;  $pagina = get_field('pagina'); if($pagina) : echo '<strong>Página:</strong> ' .$pagina; endif; ?>
                </div>
                <p><?php echo $the_excerpt; ?></p>
                <a href="<?php the_permalink(); ?>">
                    <i class="ion-plus-round"></i> Leia mais
                </a>
            </div>
        </div>

    <?php endwhile; else : ?> 
    
    <p>Sem registros encontrados!</p>
    
<?php endif; wp_reset_query();?>
