    <?php get_header(); ?>
    
    <div id="container">
      <div id="leftnav">
        <?php get_sidebar(); ?>
      </div>
      <div id="rightnav">
        <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
      </div>
      
      <div id="content">
        <?php if (have_posts()) : ?>
        
          <h2 class="pagetitle">Search Results</h2>
          
          <div class="postnavigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
          </div>
          
          <?php while (have_posts()) : the_post(); ?>
            
            <div class="post" id="post-<?php the_ID(); ?>">
              <h3 class="posttitle"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <div class="date">
                <?php the_time('Y-m-d') ?>
              </div>
              
              <div class="entry">
                <?php the_excerpt() ?>
              </div>
          
              <p class="postmetadata">Posted in <?php the_category(', ') ?> by: <?php the_author() ?><?php edit_post_link('Edit',' ',''); ?> <br/> <?php comments_popup_link('No Responses', '1 Response', '% Responses'); ?></p>
            </div>
        
          <?php endwhile; ?>

          <div class="postnavigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
          </div>
        
        <?php else : ?>

          <h2 class="pagetitle">Post Not Found</h2>
          <?php include (TEMPLATEPATH . '/searchform.php'); ?>

        <?php endif; ?>
      </div>

      <?php get_footer(); ?>
    </div>
  </body>
</html>