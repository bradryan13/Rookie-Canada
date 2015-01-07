
<footer>

    <div class="wrapper">
        
        <div id="footer-menu" class="row">


            <div class="large-6 columns">
                <h4><a href="#">Schools</a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'schools', 'menu_class' => 'footer-menu', 'container' => false)); ?>
            </div>

            <div class="large-6 columns">
                <h4><a href="#">Rugby Clubs</a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'clubs', 'menu_class' => 'footer-menu', 'container' => false)); ?>
  
            </div>

            <div class="large-6 columns">
                <h4><a href="#">Community Organizations</a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'community', 'menu_class' => 'footer-menu', 'container' => false)); ?>
  
            </div>

            <div class="large-6 columns">
                <h4><a href="#">Players & Parents</a></h4>
                <?php wp_nav_menu( array( 'theme_location' => 'players', 'menu_class' => 'footer-menu', 'container' => false)); ?>
            </div>

            <div id="social" class="row"> 
                <h4>Connect with us:</h4> <a href="https://www.facebook.com/RugbyCanada" class="ui ghost button">Facebook <i target="blank" class="icon-facebook"></i></a>  <a href="https://twitter.com/rugbycanada" target="blank" class="ui ghost button">Twitter <i class="icon-twitter"></i></a> 
            </div>

        </div>

    </div>

    <div id="statement"><h3>Rookie Rugby is an easy to play game for all ages! The rules are simple, and minimal equipment is required.</h3></div>

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