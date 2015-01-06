<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Style Guide
 */

get_header();

$page_title = get_the_title(); 

?>

<?php include(locate_template('views/partials/page-header.php')); ?>

<main>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( ! is_admin() ) : ?>
    
					    <div id="page-edit">
					        <?php edit_post_link(__('{Quick Edit}'), ''); ?>
					    </div>

    				<?php endif ?>

				<?php the_content() ?>


			<?php endwhile; ?>


			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
</main>

<?php get_footer(); ?>