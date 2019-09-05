<div id="filtro" class="wow fInLeft" data-wow-delay=".6s">
    <div class="container">
        <form id="filter" onkeypress="return event.keyCode != 13;">
            <div class="col-md-6">
                <div class="select">
                    <select class="form-control" name="autor" id="getAutor">
                        <option value="">Nome</option>

                        <?php 
                        $args = [
                            'showposts' => 200,
                            'post_type' => 'editor',
                            'orderby' => 'name', 
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'biblioteca',
                                    'compare' => '!=',
                                    'value' => '1'
                                )
                            )
                        ];

                        $the_query = new WP_Query($args);

                        if($the_query->have_posts()) :
                            while($the_query->have_posts()) : $the_query->the_post();
                    ?>

                        <option value="<?php the_id(); ?>"><?php the_title(); ?></option>

                    <?php endwhile; endif; wp_reset_query(); ?>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" name="s" id="getS" class="form-control" placeholder="Digite aqui sua pesquisa">
            </div>
        </form>
    </div>
</div>