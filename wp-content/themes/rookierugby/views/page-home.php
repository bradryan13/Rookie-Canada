<?php
/*
Template Name: Home
*/

get_header();

?>

<div id="hero">
    <div class="hero-bg" data-0="-webkit-transform: translateY(0px) translateZ(0px);" data-1000="-webkit-transform: translateY(250px) translateZ(0px);"></div>
    <div class="wrapper">

        <div class="caption" data-0="opacity: 1; -webkit-transform: translateY(0px) translateZ(0px);" data-800="opacity: 0; -webkit-transform: translateY(250px) translateZ(0px);" >
            <h2>Safe, Non-Contact Rookie Rugby.</h2>
            <p>Rookie Rugby is an easy to play game for all ages! The rules are simple, and minimal equipment is required.</p>
        </div>
 
  </div>

</div>


<div id="overview">
  <?php include(locate_template('views/partials/overview.php')); ?>
</div>


<div id="language" class="modal">
    <i class="icon-close"></i>
    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/img/large-logo.png"></a>
    <h4>Select language - Sélectionnez la langue</h4>

<ul><?php pll_the_languages();?></ul>

</div>


<?php get_footer(); ?>