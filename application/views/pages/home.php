<div class="topics-nav">
	<span <?php if ($this->uri->segment(2) == "") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('home')?>">Suggested topics</a></span>
	<?php if ($logged_in) { ?>
		<span <?php if ($this->uri->segment(2) == "follow") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('home/follow')?>">Topics I follow</a></span>
	<?php } ?>
	<span <?php if ($this->uri->segment(2) == "recent") { ?> class="active" <?php } ?> ><a href="<?php echo base_url('home/recent')?>">Most recents</a></span>
</div>


<div class="list-group">
    <?php foreach($topics as $topic): ?>
        <h4 class="list-group-item-heading"><a href="<?php echo base_url('topic/'.$topic->topic_id) ?>"><?php echo $topic->topic_name ?></a></h4>
        <p class="list-group-item-text"><?php echo $topic->topic_desc ?></p>
        <p class="list-group-item-text">
            <?php echo $topic->followers_count ?> people talking about this -
            Created by <a href="<?echo base_url('user/'.$topic->user_fullname) ?>"><?php echo $topic->user_fullname ?></a>
        </p>
    <?php endforeach; ?>
</div>
