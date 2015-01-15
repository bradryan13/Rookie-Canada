<?php  
/*  
Template Name: Game Module
*/  
?>

<?php get_header(); 
$page_header = 'Game Cards';
include(locate_template('views/partials/page-header.php')); 
?>

<main class="row" class="games">

    <section class="content-wrapper large-17 columns">

        <div class="page-type" id="content">
        
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'views/partials/content', 'page' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

        <?php 

        $module = get_field('module');
        // args
        $args = array(
            'posts_per_page'=> -1,
            'post_type' => 'game',
            'tax_query' => array(
                array(
                    'taxonomy' => 'modules',
                    'field' => 'id',
                    'terms' => $module
                )
            ),
        );


        // get results
        $the_query = new WP_Query( $args );
            if( $the_query->have_posts() ): ?>

            <ul id="cards">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
            <?php $terms = get_the_terms( $post->ID , 'modules' ); ?>

                <li class="card <?php foreach ( $terms as $term ) { echo $term->name; } ?>">
                    <div class="cf inner">
                    <div class="meta">
                            <div class="title"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></div>
                            <p>This is filler text that will describe the game. The game is played in a gym or outside with 10-12 players chasing for the ball.</p>
                            <div class="module"><i class="icon-module"></i> <?php foreach ( $terms as $term ) { echo $term->name; } ?></div>
                            <div class="time"><i class="icon-time"></i> <?php the_field('time'); ?> minutes</div>
                        </div>
                    </div>
                </li>

            <?php endwhile; ?>
            <?php endif; ?>

            </ul>

            </div>

    </section>

    <aside class="large-7 columns sidebar" data-snap-ignore="true">

        <div class="inner">
            <a href="http://www.rugbycanada.ca/"><img src="<?php echo get_template_directory_uri();?>/img/rc.png"></a>
        </div>

    </aside>

</main>



<?php get_footer(); ?>