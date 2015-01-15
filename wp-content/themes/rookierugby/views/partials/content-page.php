<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="entry-header">
    
        <h1 class="title"><?php the_title(); ?></h1>

    </div><!-- .entry-header -->

    <div class="entry-content">

        <div class="image">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
        
        <?php the_content(); ?>

    </div><!-- .entry-content -->

</article><!-- #post-## -->
