<?php
/*
Template Name: Home
*/

get_header();

?>

<div id="hero">

    <div class="wrapper">

        <div class="caption" data-0="opacity: 1" data-400="opacity: 0" >
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
    <h4>Please select your primary language:</h4>
    <div class="ui english button ghost">English</div><div class="ui button french ghost">Français (à venir)</div>
</div>


<?php get_footer(); ?>