<?php

    require_once('../../../wp-load.php');
        
    $pageNumber = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 3;

?>

<?php
        $args = array(
            'post_type' => 'agenda-noticia',
            'posts_per_page' => $pageNumber,
        );

        $the_query = new WP_Query($args);

        if($the_query->have_posts()) :
            while($the_query->have_posts()) : $the_query->the_post();

            $the_excerpt = get_the_excerpt();
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
        </div>

    <?php endwhile; else : ?> 
    
        <p>Sem registros encontrados!</p>
    
<?php endif; wp_reset_query();?>
