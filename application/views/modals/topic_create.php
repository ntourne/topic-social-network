<!-- Button trigger modal -->
<button class="btn btn-primary btn-oldstyle pull-right" data-toggle="modal" data-target="#create-topic-modal">
    Create topic
</button>

<!-- Modal -->
<div class="modal fade" id="create-topic-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('topic/create', array("method" => "post", "class" => "form-horizontal", "role" => "form")); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="modal-label">Create new topic</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="input-name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="topic_name" id="input-title" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-desc" class="col-sm-2 control-label">Descripci&oacute;n</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="input-desc" name="topic_desc"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-cat" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select name="cat_slug" id="input-cat" class="form-control">
                                <option value=""></option>
                                <?php foreach($categories as $cat): ?>
                                    <option value="<?php echo $cat->cat_slug ?>"><?php echo $cat->cat_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-oldstyle">Create topic</button>
                            <a class="btn btn-link" data-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




