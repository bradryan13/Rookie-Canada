<?php  
/*  
Template Name: Games
*/  
?>

<?php get_header(); 

$page_header = 'Game Cards';

include(locate_template('views/partials/page-header.php')); 


    // args
    $args = array(
        'posts_per_page'=> -1,
        'post_type' => 'game',
    );
    // get results
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ): ?>

<main id="games" class="row">
    
        <div class="controls">  
            <button class="filter ui button active" data-filter="all">All</button>
            <button class="filter ui button" data-filter=".Beginner">Module 1</button>
            <button class="filter ui button" data-filter=".Intermediate">Module 2</button>
            <button class="filter ui button" data-filter=".Advanced">Module 3</button>
            <button class="filter ui button" data-filter=".Advanced">Module 4</button>
            <button class="filter ui button" data-filter=".Advanced">Module 5</button>

        </div>

        <ul id="cards">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        <?php $terms = get_the_terms( $post->ID , 'modules' ); ?>

            <li class="card <?php foreach ( $terms as $term ) { echo $term->name; } ?>">
                <div class="cf inner">
<!--                     <div class="image"><?php the_post_thumbnail('card'); ?></div>
 -->                    <div class="meta">
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

</main>

<?php get_footer(); ?>
