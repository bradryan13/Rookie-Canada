<?php  
/*  
Template Name: News
*/  

get_header(); 

$page_header = 'Featured News';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

    <section class="content-wrapper large-17 columns">
        <div class="page-type" id="content">
        
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'views/partials/content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
    </section>

    <aside class="large-7 columns sidebar" data-snap-ignore="true">

        <div class="inner">
            <a href="http://www.rugbycanada.ca/"><img src="<?php echo get_template_directory_uri();?>/img/rc.png"></a>
        </div>

    </aside>

</main>

<?php get_footer(); ?>