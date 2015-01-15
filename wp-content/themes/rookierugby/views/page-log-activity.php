<?php  
/*  
Template Name: Log Activity
*/  

get_header(); 

$page_header = 'Log Activity';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

    <section class="content-wrapper large-17 columns">
        <div class="page-type" id="content">
        
            <?php echo do_shortcode('[gravityform id=1 ajax=true]'); ?>
            
        </div>
    </section>

    <aside class="large-7 columns sidebar" data-snap-ignore="true">

        <div class="inner">
            <a href="http://www.rugbycanada.ca/"><img src="<?php echo get_template_directory_uri();?>/img/rc.png"></a>
        </div>

    </aside>

</main>

<?php get_footer(); ?>