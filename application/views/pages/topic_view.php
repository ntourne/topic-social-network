<?php if (!empty($topic->cat_name)): ?>
    Posted on <a href="<?php echo base_url('search?cat='.$topic->cat_slug) ?>" class="bold"><?php echo $topic->cat_name ?></a>
<?php endif; ?>
by <a href="<?echo base_url('user/'.$topic->username) ?>" class="bold"><?php echo $topic->user_fullname ?></a>,
<span class="timestamp"><?php echo ago($topic->created_on) ?></span>


<h4><?php echo $topic->topic_name ?></h4>
<?php echo $topic->topic_desc ?>


<div class="cmt-container" >

    <?php if (isset($logged_user) && $logged_user): ?>

        <div class="new-com-bt">
            <span>Write a comment ...</span>
        </div>
        <div class="new-com-cnt">

            <b><?php echo $logged_user['fullname'] ?></b>
            <textarea class="the-new-com" id="text" name="text"></textarea>
            Share on twitter<br/>
            Share on facebook<br/>
            <button class="btn btn-primary btn-oldstyle pull-right create-comment bt-add-com">
                <span class="glyphicon glyphicon-check"></span> Comment
            </button>
        </div>
        <div class="clear"></div>
    <?php endif; ?>

    <div class="comments">
        <?php foreach($topic->comments as $comment): ?>
            <?php
                $this->load->view('sections/comment.php', array("comment" => $comment));
            ?>
            <hr/>
        <?php endforeach; ?>
    </div>

</div>



<script type="text/javascript">
    $(function(){

        // refresh time ago
        jQuery(".timeago").timeago();

        $('.new-com-bt').click(function(event){
            $(this).hide();
            $('.new-com-cnt').show();
            $('#text').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
            $(".bt-add-com").css({opacity:0.6});
            var checklength = $(this).val().length;
            if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').hide(function(){
                $('.new-com-bt').show();
            });
        });

        // on post comment click
        $('.bt-add-com').click(function(){
            var text = $('#text');

            if (!text.val()) {
                alert('You need to write a comment!');
            } else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('topic/add_comment') ?>",
                    data: 'topic_id='+<?php echo $topic->topic_id ?>+'&text='+text.val(),
                    success: function(html){
                        text.val('');
                        $('.new-com-cnt').hide(function(){
                            $('.new-com-bt').show();
                            $('.comments').prepend(html);
                        })
                    }
                });
            }
        });

    });
</script>