<div class="topics-nav">
	<span class="bold">Add topic</span>
</div>

<?php echo validation_errors(); ?>

<?php 
	$hidden = array('submit' => 'true');
?>

<?php echo form_open('topic/add', array("method" => "post", "class" => "form-horizontal"), $hidden); ?>
	<div class="control-group">
    	<label class="control-label" for="cat_id">Category</label>
    	<div class="controls">
			<select id="cat_id" name="cat_id">
				<option></option>
				<?php foreach($categories as $category) { ?>
					<option value="<?php echo $category->cat_id ?>" <?php if ($cat_id == $category->cat_id) { ?> selected="selected" <?php } ?> ><?php echo $category->cat_name ?></option>
				<?php } ?>
			</select>      		
    	</div>
  	</div>
	<div class="control-group">
    	<label class="control-label" for="topic_name">Name</label>
    	<div class="controls">
      		<input type="text" id="topic_name" name="topic_name" value="<?php echo $topic_name ?>" >
    	</div>
  	</div>
  	<div class="control-group">
    	<label class="control-label" for="topic_desc">Description</label>
    	<div class="controls">
      		<textarea id="topic_desc" name="topic_desc" rows="3"><?php echo $topic_desc ?></textarea>
    	</div>
  	</div>
  	<div class="control-group">
    	<div class="controls">
	      	<button type="submit" class="btn btn-small btn-submit">Add topic</button>
    	</div>
  	</div>
<?php echo form_close() ?>