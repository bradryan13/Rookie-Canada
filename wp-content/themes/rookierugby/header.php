<!doctype html>
<html lang="en">
<head>


    <!-- Meta -->    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rookie Rugby Canada</title>
    
    <!-- Style Sheet -->    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/less/base.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css" />

    <!-- Type Kit -->    
    <script src="//use.typekit.net/hiw3gjp.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

    <?php wp_head(); ?>

</head>

<body <?php body_class( $class ); ?>> 

    <div id="page-wrapper">
      
    <header>

        <div class="cf wrapper">

            <div id="brand">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.png"></a>
            </div>

            <div id="log-activity"><a class="activity-trigger">Log Activity</a></div>

            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false)); ?>
                    
        </div>

    </header>
