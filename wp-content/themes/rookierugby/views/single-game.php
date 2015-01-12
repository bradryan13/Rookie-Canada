<?php get_header(); 

$page_header = 'Games';

include(locate_template('views/partials/page-header.php')); ?>

<main class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content-wrapper large-17 columns">
    
        <div id="game">
            <?php get_template_part( 'views/partials/content', 'game' ); ?>
        </div>

    </section>


    <aside id="game-sidebar" class="large-7 columns sidebar">
        <h2>Module 1</h2>
        <ul>
            <li class="active">
                <div class="number">1</div>
                <div class="title">Decision Making</div>
            </li>
                        <li>
                <div class="number">2</div>
                <div class="title">Decision Game Making</div>
            </li>
                        <li>
                <div class="number">3</div>
                <div class="title">Key Away</div>
            </li>
            <li>
                <div class="number">4</div>
                <div class="title">Sharks and Minows</div>
            </li>
            <li>
                <div class="number">5</div>
                <div class="title">Game Number 5</div>
            </li>
        </ul>
    </aside>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>