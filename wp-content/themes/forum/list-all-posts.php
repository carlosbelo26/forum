<?php 

    require_once('../../../wp-load.php');

    $pageNumber = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 10;

    $tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
    
    $args = array(
        'posts_per_page' => $pageNumber, 
        'post_type' => 'post',
        'post_tag' => $tag
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

<?php  endif; wp_reset_query(); ?>