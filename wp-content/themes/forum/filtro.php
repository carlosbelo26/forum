<div id="filtro" class="wow fInLeft" data-wow-delay=".6s">
    <div class="container">
        <form id="filter" onkeypress="return event.keyCode != 13;">
            <div class="col-md-4">
                <div class="select">
                    <select class="form-control" name="tema" id="getTema">
                        <option value="">Temas</option>

                        <?php
                            $categories = get_categories([
                                'hide_empty' => true, 
                                'orderby' => 'name', 
                                'order' => 'ASC'
                            ]);

                            
                            if ($categories) :
                                foreach ($categories as $cat) :
                        ?>
                            
                            <option value="<?php echo $cat->term_id; ?>"><?php echo $cat->cat_name; ?></option>
                        
                        <?php endforeach; endif; ?>

                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="select">
                    <select class="form-control" name="autor" id="getAutor">
                        <option value="">Autor</option>

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
            <div class="col-md-4">
                <div class="select">
                    <select class="form-control" name="tipo" id="getTipo">
                        <option value="">Tipo de Mídia</option>
                        
                        <?php
                            $tipos = get_terms([
                                'taxonomy' => 'tipos',
                                'hide_empty' => false,
                                'orderby' => 'name', 
                                'order' => 'ASC'
                                
                            ]);
                            
                            if ($tipos) :
                                foreach($tipos as $tipos_) :
                        ?>
                            
                            <option value="<?php echo $tipos_->slug; ?>"><?php echo $tipos_->name; ?></option>
                        
                        <?php endforeach; endif; ?>

                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <input type="text" name="s" id="getS" class="form-control" placeholder="Digite aqui sua pesquisa">
            </div>
        </form>
    </div>
</div>
