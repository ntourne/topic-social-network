<div class="page-header topics-nav">
    <span <?php if ($this->uri->segment(2) == "") { ?> class="bold" <?php } ?> ><a href="<?php echo base_url('home')?>">Suggested topics</a></span>
    <?php if ($logged_in) { ?>
        <span <?php if ($this->uri->segment(2) == "follow") { ?> class="bold" <?php } ?> ><a href="<?php echo base_url('home/follow')?>">Topics I follow</a></span>
    <?php } ?>
    <span <?php if ($this->uri->segment(2) == "recent") { ?> class="bold" <?php } ?> ><a href="<?php echo base_url('home/latest')?>">Latest topics</a></span>
    <span class="pull-right"><a href="<?php echo base_url('settings') ?>">Settings</a></span>
</div>


<div class="media">
    <?php foreach($topics as $topic): ?>
        <div class="media-body topics-list">
            <div class="cat">
                <?php if (!empty($topic->cat_name)): ?>
                    Posted on <a href="<?php echo base_url('search?cat='.$topic->cat_slug) ?>" class="bold"><?php echo $topic->cat_name ?></a>
                <?php endif; ?>
                by <a href="<?echo base_url('user/'.$topic->user_username) ?>" class="bold"><?php echo $topic->user_fullname ?></a>,
                <span class="timestamp"><?php echo ago($topic->created_on) ?></span>
            </div>
            <h4 class="media-heading name"><a href="<?php echo base_url('topic/'.$topic->topic_id) ?>"><?php echo $topic->topic_name ?></a></h4>
            <div class="desc"><?php echo $topic->topic_desc ?></div>
            <div class="info">
                <a href="#">Like</a> -
                <a href="#">Comment</a> -
                <a href="#">Share</a> -
                <?php echo $topic->followers_count ?> people talking about this
            </div>
        </div>
        <hr/>
    <?php endforeach; ?>
</div>

<?php
/*
<div class="list-group topics-list">
    <?php foreach($topics as $topic): ?>
        <p class="list-group-item-text cat">
            <?php if (!empty($topic->cat_name)): ?>
                Posted on <a href="<?php echo base_url('search?cat='.$topic->cat_slug) ?>" class="bold"><?php echo $topic->cat_name ?></a>,
            <?php endif; ?>
            <span class="timestamp">2 hours ago</span>
        </p>
        <h4 class="list-group-item-heading name"><a href="<?php echo base_url('topic/'.$topic->topic_id) ?>"><?php echo $topic->topic_name ?></a></h4>
        <p class="list-group-item-text desc"><?php echo $topic->topic_desc ?></p>
        <p class="list-group-item-text info">
            by <a href="<?echo base_url('user/'.$topic->user_fullname) ?>"><?php echo $topic->user_fullname ?></a> -
            <?php echo $topic->followers_count ?> people talking about this
        </p>
        <hr/>
    <?php endforeach; ?>
</div>
*/
?>