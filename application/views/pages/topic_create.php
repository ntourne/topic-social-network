<div class="page-header topics-nav">
    <span>Create topic</span>
</div>


<?php echo form_open('topic/create', array("method" => "post", "class" => "form-horizontal", "role" => "form")); ?>
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
            <a href="<?php echo base_url('home') ?>" class="btn btn-link">Cancel</a>
        </div>
    </div>
<?php echo form_close() ?>