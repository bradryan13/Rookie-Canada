<?php
/*
Template Name: French Home
*/

get_header();

?>

<div id="hero">
    <div class="hero-bg" data-0="-webkit-transform: translateY(0px) translateZ(0px);" data-1000="-webkit-transform: translateY(250px) translateZ(0px);"></div>
    <div class="wrapper">

        <div class="caption" data-0="opacity: 1; -webkit-transform: translateY(0px) translateZ(0px);" data-800="opacity: 0; -webkit-transform: translateY(250px) translateZ(0px);" >
            <h2>Rookie Rugby, sécuritaire et sans contact.</h2>
            <p>Rookie Rugby est un jeu facile à jouer à tous les âges! Les règles sont simples et l’équipement requis est minimal.</p>
        </div>
 
  </div>

</div>


<div id="overview">
  <?php include(locate_template('views/partials/french-overview.php')); ?>
</div>


<div id="language" class="modal">
    <i class="icon-close"></i>
    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/large-logo.png"></a>
    <h4>Please select your primary language:</h4>
    <div class="ui english button ghost">English</div><div class="ui button french ghost">Français (à venir)</div>
</div>


<?php get_footer(); ?>