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

          <?php while (have_posts()) : the_post(); ?>

            <div class="post" id="post-<?php the_ID(); ?>">
              <h3 class="posttitle"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <div class="date">
                <?php the_time('Y-m-d') ?>
              </div>
              
              <div class="entry">
                <?php the_content('Continue Reading &raquo;'); ?>
              </div>

              <div class="postmetadata">
                Posted in <?php the_category(', ') ?> by: <?php the_author() ?><?php edit_post_link('Edit',' ',''); ?><br/>
                <?php $tag_list = get_the_tag_list('', ', '); ?>
                <?php if ($tag_list) {echo 'Tagged '.$tag_list.'<br />';} ?>
                <?php comments_popup_link('No Responses', '1 Response', '% Responses'); ?><br/>
                <?php if (function_exists('the_views')) { the_views(); } ?>
              </div>
            </div>

          <?php endwhile; ?>

          <div class="postnavigation">
            <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
            <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
          </div>

        <?php else : ?>

          <h2 class="pagetitle">Not Found</h2>
          <p>Sorry, but you are looking for something that isn't here.</p>
          <?php include (TEMPLATEPATH . "/searchform.php"); ?>

        <?php endif; ?>
      </div>

      <?php get_footer(); ?>
    </div>
  </body>
</html>