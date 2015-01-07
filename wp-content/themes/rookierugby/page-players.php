<?php  
/*  
Template Name: Players
*/  

get_header(); 

$page_header = 'Players';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

    <aside class="large-7 columns sidebar" data-snap-ignore="true">

        <?php wp_nav_menu( array( 'theme_location' => 'players', 'menu_class' => 'sub-menu', 'container' => false)); ?>
        
    </aside>


    <section class="content-wrapper large-17 columns">
        <div class="page-type" id="content">
        
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'views/partials/content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>