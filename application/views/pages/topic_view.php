<?php if (!empty($topic->cat_name)): ?>
    Posted on <a href="<?php echo base_url('search?cat='.$topic->cat_slug) ?>" class="bold"><?php echo $topic->cat_name ?></a>
<?php endif; ?>
by <a href="<?echo base_url('user/'.$topic->username) ?>" class="bold"><?php echo $topic->user_fullname ?></a>,
<span class="timestamp"><?php echo ago($topic->created_on) ?></span>


<h4><?php echo $topic->topic_name ?></h4>
<?php echo $topic->topic_desc ?>


<div class="cmt-container" >
    <?php foreach($topic->comments as $comment): ?>
        <?php
        $default = "mm";
        $size = 35;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($comment->user_email)))."?d=".$default."&s=".$size;
        ?>

        <div class="cmt-cnt">
            <img src="<?php echo $grav_url; ?>" />
            <div class="thecom">
                <h5><?php echo $comment->user_fullname; ?></h5><span data-utime="<?php echo $comment->created_on ?>" class="com-dt"><?php echo ago($comment->created_on) ?></span>
                <br/>
                <p>
                    <?php echo $comment->text; ?>
                </p>
            </div>
        </div><!-- end "cmt-cnt" -->

        <hr/>

    <?php endforeach; ?>


    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">

        <b><?php echo $logged_user['fullname'] ?></b>
        <?php
        /*
        <input type="text" id="name-com" name="name-com" value="" placeholder="Your name" />
        <input type="text" id="mail-com" name="mail-com" value="" placeholder="Your e-mail address" />
        */
        ?>
        <textarea class="the-new-com" id="text" name="text"></textarea>
        Share on twitter<br/>
        Share on facebook<br/>
        <button class="btn btn-primary btn-oldstyle pull-right create-comment bt-add-com" data-toggle="modal" data-target="#create-topic-modal">
            <span class="glyphicon glyphicon-check"></span> Comment
        </button>
        <?php /*
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
        */ ?>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->



<script type="text/javascript">
    $(function(){
        //alert(event.timeStamp);
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
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');

            if( !theCom.val()){
                alert('You need to write a comment!');
            }else{
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment.php",
                    data: 'act=add-com&id_post='+<?php echo $topic->topic_id ?>+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);
                        })
                    }
                });
            }
        });

    });
</script>

<?php /* var_dump($topic) */ ?>
