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
              <div id="postwidgetabovetitle">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single-above-title') ) : ?><?php endif; ?>
              </div>
              <h3 class="posttitle"><a href="<?php echo get_permalink() ?>" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <div class="date">
                <?php the_time('Y-m-d') ?>
              </div>
              <div id="postwidgetbelowtitle">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single-below-title') ) : ?><?php endif; ?>
              </div>
              
              <div class="entry">
                <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
              </div>

              <div id="postwidgetbelowcontent">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single-below-content') ) : ?><?php endif; ?>
              </div>
              
              <div class="postmetadata">
                Posted on <?php the_time('Y年n月j日l') ?>, <?php the_time() ?>. Filed under <?php the_category(', '); $tag_list = get_the_tag_list('', ', '); if ($tag_list) {echo ' and tagged '.$tag_list;} ?>.
                
                <!--Follow any responses to this entry through the <?php //comments_rss_link('RSS 2.0 feed'); ?>.-->

                <?php if ('open' == $post->ping_status) {
                // Pings are Open ?>
                <!--<a href="<?php //trackback_url(true); ?>">Trackback</a> from your own site.-->

                <?php } else { ?>
                Pingbacks and trackbacks are not allowed.

                <?php } edit_post_link('Edit this entry.','',''); ?>
              </div>
            </div>
            
            <div class="postnavigation">
              <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
              <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
            </div>

            <?php comments_template(); ?>

          <?php endwhile; else: ?>

            <p>Sorry, no posts matched your criteria.</p>

          <?php endif; ?>

      </div>

      <?php get_footer(); ?>
    </div>
  </body>
</html>