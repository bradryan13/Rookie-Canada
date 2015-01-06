<?php $terms = get_the_terms( $post->ID , 'modules' ); ?>

<article id="game-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="cf entry-header">
    
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="meta">
            <div class="module"><i class="icon-module"></i> <?php foreach ( $terms as $term ) { echo $term->name; } ?></div>
            <div class="time"><i class="icon-time"></i> <?php the_field('time'); ?> minutes</div>
            <div class="equipment"><i class="icon-module"></i> <?php the_field('equipment'); ?></div>
            <div class="pdf"><a target="_blank" href="<?php the_field('pdf'); ?>">Download PDF</div>
        </div>

    </div><!-- .entry-header -->

    <div class="entry-content">

        <h3>How to play</h3>
        <div class="image"><?php the_post_thumbnail('card'); ?></div>
        <?php the_field('how_to_play'); ?>

    </div><!-- .entry-content -->

    <div class="sub-content row">

        <div class="large-12 columns">
            <h3>Coaching Points</h3>
            <?php the_field('coaching_points'); ?>
        </div>

        <div class="large-12 columns">
            <h3>Difficulty</h3>
            <?php the_field('difficulty'); ?>
        </div>


    </div>

</article><!-- #post-## -->
