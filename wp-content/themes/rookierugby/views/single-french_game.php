<?php get_header(); 

$page_header = 'French Games';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content-wrapper game-wrapper large-17 columns">
    
        <div id="game">
            <?php get_template_part( 'views/partials/content', 'french-game' ); ?>
        </div>

    </section>


    <aside id="game-sidebar" class="large-7 columns sidebar">
        <h2>More Games...</h2>

    <?php // args
    $args = array(
        'posts_per_page'=> 10,
        'post_type' => 'french_game',
    );
    // get results
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): ?>

        <ul>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        <?php $terms = get_the_terms( $post->ID , 'modules' ); ?>

            <li class="active">
                <div class="title"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></div>
            </li>

        <?php endwhile; ?>
        <?php endif; ?>
        </ul>
    </aside>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>