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

        <div class="row" id="modules">

            <h2>Programs</h2>

            <div class="columns module medium-6">
                <div class="a inner">
                    <a href='#'>Module 1</a>
                </div>
            </div>

            <div class="columns module medium-6">
                <div class="b inner">
                    <a href='#'>Module 2</a>
                </div>
            </div>

            <div class="columns module medium-6">
                <div class="c inner">
                    <a href='#'>Module 3</a>
                </div>
            </div>

            <div class="columns module medium-6">
                <div class="d inner">
                    <a href='#'>Module 4</a>
                </div>
            </div>

        </div>

        <h2>Individual Games</h2>
        
        <ul id="cards">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
        <?php $terms = get_the_terms( $post->ID , 'modules' ); ?>

            <li class="card <?php foreach ( $terms as $term ) { echo $term->name . ' '; } ?>">
                <div class="cf inner">
                    <div class="meta">
                        <div class="title"><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></div>
                        <p>This is filler text that will describe the game. The game is played in a gym or outside with 10-12 players chasing for the ball.</p>
                        <div class="module"><i class="icon-module"></i> <?php foreach ( $terms as $term ) { echo $term->name . ' '; } ?></div>
                        <div class="time"><i class="icon-time"></i> <?php the_field('time'); ?> minutes</div>
                    </div>
                </div>
            </li>

        <?php endwhile; ?>
        <?php endif; ?>

        </ul>

</main>

<?php get_footer(); ?>
