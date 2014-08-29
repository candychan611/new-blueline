<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_get_archives('type=monthly&format=link'); ?>

    <?php wp_head(); ?>
  </head>

  <body>
    <div id="blogtitle">
      <h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
      <div id="blogdescription"><?php bloginfo('description'); ?></div>
    </div>

    <div id="navigation">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset>
          <input type="submit" value="Go!" id="searchbutton" name="searchbutton" class="button" />
          <input value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" class="searchtextbox" />
        </fieldset>
      </form>

      <ul>
        <!--<li<?php //if (is_home()) echo " class=\"selected\""; ?>><a href="<?php //bloginfo('url'); ?>">Home</a></li>-->
        <?php wp_list_pages('title_li=&depth=1'); ?>
      </ul>

    </div>