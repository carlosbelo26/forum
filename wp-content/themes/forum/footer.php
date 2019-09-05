
        <style>
            #footer ul {
                width: 25%;
            }
            #footer .uls {
                width: 30%;
            }
            @media only screen and (min-width: 0) and (max-width: 992px){
                #footer ul {
                    width: 100%;
                }
                #footer .uls {
                    width: 100%;
                }
            }
        </style>
        
        <section class="section" id="newsletter">
            <div class="container">
                <div class="col-md-8 wow fInLeft">
                    <h3>Inscreva-se na nossa newsletter</h3>
                </div>
                <div class="col-md-4 pull-right">
                    <div class="btns wow fInLeft" data-wow-delay=".2s">
                        <a href="http://eepurl.com/dKMnT6" taget="_blank" class="btn">inscreva-se</a>
                        <a href="http://eepurl.com/dKMnT6" taget="_blank" class="rss">
                            <i class="ion-social-rss"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <footer id="footer">
            <div class="container">
                <!-- <div class="col-xs-12 col-md-3">
                    <div class="logo">
                        <a href="http://forumdofuturo.org/" target="_blank">
                            <img src="http://www.plataformadoconhecimento.com/wp-content/themes/paa/app/images/forum.png" class="img-responsive">
                        </a>
                    </div>
                </div> -->
                <div class="col-xs-12 col-md-9">
                    <ul>
                        <li><h3>Sobre Nós</h3></li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=569">
                                Quem Somos
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=569#quemfaz">
                               Quem Faz
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=569#quemapoia">
                                Quem Apoia
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?post_type=projeto">
                                Projetos
                            </a>
                        </li>
                    </ul>
                    <ul class="uls">
                        <li><h3>Sala de Imprensa</h3></li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=187">
                                Agenda e Notícias
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=189">
                                Debates
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=187#banco-de-imagem">
                                Banco de Imagens
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=187#nos-na-midia">
                                Nós na Mídia
                            </a>
                        </li>
                        <li>
                            <a href="<?php bloginfo('url'); ?>/?page_id=187#sala-de-imprensa">
                                Contato
                            </a>
                        </li>
                    </ul>
                    <ul class="uls">
                        <li><h3>Acesso Restrito</h3></li>
                        <li>
                            <a href="https://sites.google.com/site/forumdofuturointranet/" target="_blank">
                                Intranet
                            </a>
                        </li>
                        <li>
                            <a href="http://www.forumdofuturo.org/projeto/acesso-restrito-aos-colaboradores/" target="_blank">
                                Extranet
                            </a>
                        </li>
                    </ul>    
                </div>
                <div class="col-xs-12 col-md-3 pull-right">
                    <div class="socials">
                        <h3>Siga-nos</h3>
                        <a href="https://www.linkedin.com/company/forumdofuturo" target="_blank">
                            <i class="ion-social-linkedin-outline"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCyUNppCo1JTJogsgG2DvNcw" target="_blank">
                            <i class="ion-social-youtube-outline"></i>
                        </a>
                        <a href="https://www.facebook.com/forumdofuturo" target="_blank">
                            <i class="ion-social-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/forumdofuturo" target="_blank">
                            <i class="ion-social-instagram-outline"></i>
                        </a>
                        <a href="https://twitter.com/forumfuturo" target="_blank">
                            <i class="ion-social-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="cc">Feito com carinho pela N Coisas Digitais</div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>

        <script src="<?php bloginfo('template_directory'); ?>/app/scripts/plugins.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/app/scripts/main.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>

        <script>
            jQuery('.wp-caption a').fancybox({});
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128864100-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-128864100-1');
        </script>
     
    </body>
</html>