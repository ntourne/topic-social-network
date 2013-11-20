<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#create-topic-modal">
    Create topic
</button>

<!-- Modal -->
<div class="modal fade" id="create-topic-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create new topic</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <?php /*
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                */ ?>
                <button type="button" class="btn btn-primary">Publish!</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->