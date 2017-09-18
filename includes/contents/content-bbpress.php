<div id="bbpress-post-list-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title section-title">', '</h1>' ); ?>
        </header>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <!-- .entry-content -->
    </article>
</div>