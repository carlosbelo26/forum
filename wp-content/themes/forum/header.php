<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/app/images/favicon.png" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/app/styles/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/app/styles/main.min.css">
        <!--<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/app/styles/all.css">-->
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

        <!-- Please dont use IE :D -->
        <!--[if lt IE 8]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
        
    </head>
    <body id="home" <?php body_class(); ?>>
        <div id="preloaderAll">
             <img src="<?php bloginfo('template_directory'); ?>/app/images/puff.svg" class="img-responsive" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
        </div>

        <header id="header">
            <div class="btnav">
                <i class="ion-navicon"></i>
            </div>
            <div class="container">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="<?php bloginfo('url'); ?>?page_id=10">
                            <img src="<?php bloginfo('template_directory'); ?>/app/images/logo.png" class="img-responsive logon" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 nomobile">      
                    <nav class="nav">
                        <?php include'nav.php'; ?>
                    </nav>
                </div>
            </div>
            <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" class="field" name="s" id="s" placeholder="Digite aqui sua pesquisa" />
                <button><i class="ion-android-search"></i></button>
            </form>
        </header>

        <nav class="nav navmobile">
            <?php include'nav.php'; ?>
        </nav>