<?php  
/*  
Template Name: Contact
*/  

get_header(); 

$page_header = 'Contact';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

    <section class="content-wrapper large-24 columns">
        <div class="page-type" id="content">
        
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'views/partials/content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>