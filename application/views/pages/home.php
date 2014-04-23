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
        <?php $this->load->view('sections/topic.php', array('topic' => $topic)) ?>
    <?php endforeach; ?>
</div>



<script type="text/javascript">

    $(function(){

        // refresh time ago
        jQuery(".timeago").timeago();

        $('.new-com-bt').click(function(event){
            var topic_view = $(this).parents('.topic-view'); // .data('topic_id'));
            topic_view.find('.new-com-cnt').show();
            $(this).hide();
            topic_view.find('.text').focus();
            // $('.new-com-cnt').show();
            // $('#text').focus();
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