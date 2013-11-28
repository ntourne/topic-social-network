<?php
    $default = "mm";
    $size = 35;
    $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($comment->user_email)))."?d=".$default."&s=".$size;
?>

<div class="cmt-cnt">
    <img src="<?php echo $grav_url; ?>" />
    <div class="thecom">
        <h5><?php echo $comment->user_fullname; ?></h5><span data-utime="<?php echo $comment->created_on ?>" class="com-dt">
            <span class="timeago" title="<?php echo date('c', $comment->created_on); ?>"><?php echo ago($comment->created_on) ?></span>
        </span>
        <br/>
        <p>
            <?php echo $comment->text; ?>
        </p>
    </div>
</div><!-- end "cmt-cnt" -->
