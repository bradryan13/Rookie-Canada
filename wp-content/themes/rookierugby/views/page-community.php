<?php  
/*  
Template Name: Community
*/  

get_header(); 

$mylocale = get_bloginfo('language');

if($mylocale == 'fr-FR'){
    $page_header = 'Organismes Communautaires';
} else {
    $page_header = 'Community Organizations';
}


include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

    <aside class="large-7 columns sidebar" data-snap-ignore="true">

        <?php wp_nav_menu( array( 'theme_location' => 'community', 'menu_class' => 'sub-menu', 'container' => false)); ?>
        
    </aside>


    <section class="content-wrapper large-17 columns">
        <div class="page-type" id="content">
        
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'views/partials/content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>