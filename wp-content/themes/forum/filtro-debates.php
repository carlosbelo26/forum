<div id="filtro" class="wow fInLeft" data-wow-delay=".6s">
    <div class="container">
        <form id="filter" onkeypress="return event.keyCode != 13;">
            <div class="col-md-6">
                <div class="select">
                    <select class="form-control" name="tipo" id="getTipo">
                        <option value="">Temas Destaques</option>
                        
                        <?php
                            $tipos = get_terms([
                                'taxonomy' => 'categoria_link',
                                'hide_empty' => false,
                                'orderby' => 'name', 
                                'order' => 'ASC',
                                'parent' => '312',
                            ]);
                            
                            if ($tipos) :
                                foreach($tipos as $tipos_) :
                        ?>
                            
                            <option value="<?php echo $tipos_->slug; ?>" class="<?php echo $tipos_->slug; ?>"><?php echo $tipos_->name; ?></option>
                        
                        <?php endforeach; endif; ?>

                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" name="s" id="getS" class="form-control" placeholder="Digite aqui sua pesquisa">
            </div>
        </form>
    </div>
</div>
