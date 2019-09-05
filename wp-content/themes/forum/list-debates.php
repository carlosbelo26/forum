<?php

require_once('../../../wp-load.php');

$s = (isset($_GET['s'])) ? $_GET['s'] : '';
$categoria_link = (isset($_GET['tipo'])) ? $_GET['tipo'] : '';
$pageNumber = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 10;

?>
<?php if ($categoria_link) : ?>
<div class="searchresults">
    <h3><strong>Sua busca para:</strong> <?php if ($s) {
                                            echo $s . ' / ';
                                          } ?><?php if ($categoria_link) {
                                                                            echo ' / ' . $categoria_link;
                                                                          } ?> </h3>
</div>
<div class="clearfix"></div>
<?php endif; ?>

<?php
        // $args = array(
//     'categoria_link' => $categoria_link,
//     'post_type' => 'links',
//     'posts_per_page' => $pageNumber,
//      'meta_key' => 'fonte',
//     /'meta_value'=> ('Nexo'),
//     'meta_query'	=> array(
//         'relation'		=> 'OR',
//         array(
//             'key'		=> 'fonte',
//             'value'		=> $s,
//             'compare'	=> 'LIKE'
//         ),
//     )
// );

$q1 = get_posts(array(
  'fields' => 'ids',
  'categoria_link' => $categoria_link,
  'post_type' => 'links',
  'posts_per_page' => $pageNumber,
  's' => $s
));

// $q2 = get_posts(array(
//   'fields' => 'ids',
//   'post_type' => 'links',
//   'meta_query'  => array(
//     'relation'  => 'OR',
//     array(
//       'key'    => 'fonte',
//       'value'    => $s,
//       'compare'  => 'LIKE'
//     ),
//   )
// ));

// $unique = array_unique(array_merge($q1, $q2));

// print_r($unique);

$args = array(
  'post_type' => 'links',
  'post__in' => $q1,
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) :
  while ($the_query->have_posts()) : $the_query->the_post();

    $the_excerpt = get_the_excerpt();

    ?>

<!-- <div class="post animated fInLeft" data-wow-delay=".2s">
    <div class="desc">
        <div class="catgories">
            <?php the_category(', '); ?>
        </div>
        <a href="<?php $link = get_field('link');
                  if ($link) : echo $link;
                  else : echo 'javascript:void(0)';
                  endif; ?>" target="_blank">
            <h1><?php the_title(); ?></h1>
            <small>
                <?php the_time('d'); ?> de <?php the_time('M'); ?>, <?php the_time('Y'); ?> |
                <span>
                    <?php $fonte = get_field('fonte');
                    if ($fonte) : echo $fonte;
                    endif; ?>
                </span>
            </small>
            <p><?php echo $the_excerpt; ?></p>
        </a>
    </div>
    <a href="<?php $link = get_field('link');
              if ($link) : echo $link;
              else : echo 'javascript:void(0)';
              endif; ?>" target="_blank">
        <figure>
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('tbP');
            }
            ?>
        </figure>
    </a>
</div> -->

  <div class="post wow fInLeft" data-wow-delay=".2s">
    <figure>
      <?php
            if (has_post_thumbnail()) { 
                the_post_thumbnail('thumbnail'); 
            }
        ?>
    </figure>
    <div class="desc">
      <div class="catgories">
        <?php
          $terms = get_the_terms( $post->ID, 'categoria_link' ); 
          foreach($terms as $term) :

          $qtdt = count($terms); 
          if($qtdt >= 2) :
        ?>
        <a href="<?php bloginfo('url'); ?>/?categoria_link=<?php echo $term->slug; ?>"><?php echo $term->name; ?>, </a>
        <?php else : ?>
        <a href="<?php bloginfo('url'); ?>/?categoria_link=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <h1><?php the_title(); ?></h1>
      <small>
        <?php the_time('d');?> de <?php the_time('M');?>, <?php the_time('Y');?> |
        <span>
          <a href="<?php echo $editor->guid; ?>"><?php echo $editor->post_title; ?></a>
        </span>
        <span><?php $fonte = get_field('fonte'); if($fonte) : echo $fonte; endif; ?></span>
      </small>
      <p><?php echo $the_excerpt; ?></p>
      <a href="<?php $link = get_field('link'); if($link) : echo $link; else : echo 'javascript:void(0)'; endif; ?>" target="_blank">
        <i class="ion-plus-round"></i> Leia mais
      </a>
    </div>
  </div>

<?php endwhile;
else : ?>

<p>Sem registros encontrados!</p>

<?php endif;
//wp_reset_query(); ?> 