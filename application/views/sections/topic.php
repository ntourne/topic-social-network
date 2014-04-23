<div class="media-body topic-view" data-topic_id="<?php echo $topic->topic_id ?>">
    <div class="cat">
        <?php if (!empty($topic->cat_name)): ?>
            Posted on <a href="<?php echo base_url('search?cat='.$topic->cat_slug) ?>" class="bold"><?php echo $topic->cat_name ?></a>
        <?php endif; ?>
        by <a href="<?echo base_url('user/'.$topic->user_username) ?>" class="bold"><?php echo $topic->user_fullname ?></a>,
        <span class="timestamp timeago" title="<?php echo date('c', $topic->created_on); ?>"><?php echo ago($topic->created_on) ?></span>
    </div>
    <h4 class="media-heading name">
        <a href="<?php echo base_url('topic/'.$topic->topic_id) ?>"><?php echo $topic->topic_name ?></a>
        <span class="desc"><?php echo $topic->topic_desc ?></span>
    </h4>
    <div class="info">
        <a href="#">Like</a> -
        <a href="#">Comment</a> -
        <a href="#">Share</a> -
        <?php echo $topic->followers_count ?> people talking about this
    </div>


    <div class="cmt-container">

        <?php if (isset($logged_user) && $logged_user): ?>

            <div class="new-com-bt">
                <span>Write a comment ...</span>
            </div>
            <div class="new-com-cnt">

                <b><?php echo $logged_user['fullname'] ?></b>
                <textarea class="the-new-com text" name="text"></textarea>
                Share on twitter<br/>
                Share on facebook<br/>
                <button class="btn btn-primary btn-oldstyle pull-right create-comment bt-add-com">
                    <span class="glyphicon glyphicon-check"></span> Comment
                </button>
            </div>
            <div class="clear"></div>
        <?php endif; ?>

        <div class="comments">
            <?php if (isset($topic->comments)): ?>
                <?php foreach($topic->comments as $comment): ?>
                    <?php
                    $this->load->view('sections/comment.php', array("comment" => $comment));
                    ?>
                    <hr/>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>


</div>


