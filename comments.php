<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
  if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
    <p class="nocomments">This post is password protected. Enter the password to view responses.<p>
<?php
    return;
  }
}

/* This variable is for alternating comment background */
$oddcomment = 'alt';
$commentcount=1;
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
  <h4 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h4> 

  <ol class="commentlist">

    <?php foreach ($comments as $comment) : ?>

      <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
        <div class="commentnumber"><?php echo $commentcount++;?></div>
        <cite><?php comment_author_link() ?> Says: </cite>

        <?php if ($comment->comment_approved == '0') : ?>
          <em>Your response is awaiting moderation.</em>
        <?php endif; ?>

        <br />

        <?php comment_text() ?>
        <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">On <?php comment_date('Y-m-d') ?> <?php comment_time() ?>.</a> <?php edit_comment_link('Edit this reply.','',''); ?></small>

      </li>

      <?php /* Changes every other comment to a different class */
      if ('alt' == $oddcomment) $oddcomment = '';
      else $oddcomment = 'alt';
      ?>

    <?php endforeach; /* end for each comment */ ?>

  </ol>

<?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : // If comments are open, but there are no comments ?> 
    <p>No responses yet.</p>
  <?php else : // comments are closed ?>
    <p class="nocomments">Responses are closed.</p>
  <?php endif; ?>

<?php endif; ?>

<!-- The leave new comment form -->

<?php if ('open' == $post->comment_status) : ?>

  <h4 id="respond">Leave a Reply</h4>

  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a reply.</p>
  <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

      <?php if ( $user_ID ) : ?>
        <p><label class="commentformtext">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></label></p>
      <?php else : ?>

        <p><input class="commentformshortinput" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
        <label for="author" class="commentformtext">Name <?php if ($req) echo "(required)"; ?></label></p>

        <p><input class="commentformshortinput" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
        <label for="email" class="commentformtext">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>

        <p><input class="commentformshortinput" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
        <label for="url" class="commentformtext">Website</label></p>

      <?php endif; ?>

      <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

      <p><textarea class="commentformcommentinput" name="comment" id="comment" cols="100%"tabindex="4"></textarea></p>

      <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Reply" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>
      <?php do_action('comment_form', $post->ID); ?>

    </form>

  <?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
