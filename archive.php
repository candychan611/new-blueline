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

          <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
          <?php /* If this is a category archive */ if (is_category()) { ?>
          <h4>Archive for the '<?php echo single_cat_title(); ?>' Category</h4>

          <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
          <h4>Archive for <?php the_time('F jS, Y'); ?></h4>

          <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
          <h4>Archive for <?php the_time('F, Y'); ?></h4>

          <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
          <h4>Archive for <?php the_time('Y'); ?></h4>

          <?php /* If this is a search */ } elseif (is_search()) { ?>
          <h4>Search Results</h4>

          <?php /* If this is an author archive */ } elseif (is_author()) { ?>
          <h4>Author Archive</h4>

          <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
          <h4>Blog Archives</h4>

          <?php } ?>

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
                <?php the_excerpt() //force to show only small part of the post in archive ?>
              </div>

              <div class="postmetadata">
                Posted in <?php the_category(', ') ?> by: <?php the_author() ?><?php edit_post_link('Edit',' ',''); ?> <br/>
                <?php comments_popup_link('No Responses', '1 Response', '% Responses'); ?><br/>
                <?php if(function_exists('the_views')) { the_views(); } ?>
              </div> 
            </div>

          <?php endwhile; ?>

          <div class="postnavigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
          </div>

        <?php else : ?>

          <h4>Not Found</h4>
          <?php include (TEMPLATEPATH . '/searchform.php'); ?>

        <?php endif; ?>
      </div>

      <?php get_footer(); ?>
    </div>
  </body>
</html>