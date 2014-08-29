<ul id="sidebarleft">

  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('left-sidebar') ) : else : ?>
    <li id="pages">
      <?php _e('<h2 class="widgettitle">Pages</h2>'); ?>
      <ul>
        <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
      </ul>
    </li>

    <li id="categories">
      <?php _e('<h2 class="widgettitle">Categories</h2>'); ?>
      <ul>
        <?php wp_list_cats(''); ?>
      </ul>
   </li>

    <li id="archives">
      <?php _e('<h2 class="widgettitle">Archives</h2>'); ?>
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
  <?php endif; ?>
  
</ul>