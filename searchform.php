<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <input value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" class="searchtextbox" />
  <input type="submit" value="Go!" id="searchbutton" name="searchbutton" class="button" />
</form>