
<?php 
$mylocale = get_bloginfo('language');

if($mylocale == 'fr-FR'){
    $orgs = 'Organismes Communautaires';
    $players = 'Parents et Joueurs';
    $clubs = 'Clubs de Rugby';
    $schools = 'Écoles';
    $social = 'Communiquez avec nous:';
    $tag = 'Rookie Rugby est un jeu facile à jouer à tous les âges! Les règles sont simples et l’équipement requis est minimal.';
} else {
    $orgs = 'Community Organizations';
    $players = 'Players & Parents';
    $clubs = 'Rugby Clubs';
    $schools = 'Schools';
    $social = 'Connect with us:';
    $tag = 'Rookie Rugby is an easy to play game for all ages! The rules are simple, and minimal equipment is required.';
}
?>

<footer>

    <div class="wrapper">
        
        <div id="footer-menu" class="row">


            <div class="large-6 columns">
                <h4><a href="#"><?php echo $schools ?></a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'schools', 'menu_class' => 'footer-menu', 'container' => false)); ?>
            </div>

            <div class="large-6 columns">
                <h4><a href="#"><?php echo $clubs ?></a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'clubs', 'menu_class' => 'footer-menu', 'container' => false)); ?>
  
            </div>

            <div class="large-6 columns">
                <h4><a href="#"><?php echo $orgs ?></a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'community', 'menu_class' => 'footer-menu', 'container' => false)); ?>
  
            </div>

            <div class="large-6 columns">
                <h4><a href="#"><?php echo $players ?></a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'players', 'menu_class' => 'footer-menu', 'container' => false)); ?>
            </div>

            <div id="social" class="row"> 
                <h4><?php echo $social ?></h4> <a href="https://www.facebook.com/RugbyCanada" class="ui ghost button">Facebook <i target="blank" class="icon-facebook"></i></a>  <a href="https://twitter.com/rugbycanada" target="blank" class="ui ghost button">Twitter <i class="icon-twitter"></i></a> 
            </div>

        </div>

    </div>

    <div id="statement"><h3><?php echo $tag; ?></h3></div>

    <div id="copy-right">Copyright © Rugby Canada • All rights reserved</div>

</footer>

</div> <!-- close wrapper -->


<div id="slide-out">
    <div class="panel-header">
      <h3>Log Activity</h3>
      <div>
        <i class="icon-close"></i>
      </div>
    </div>
    <?php echo do_shortcode('[gravityform id=1 ajax=true]'); ?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo get_template_directory_uri();?>/js/main.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>