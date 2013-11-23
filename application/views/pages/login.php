<?php echo form_open('login', array("class" => "form-inline", "role" => "form")); ?>
    <div class="form-group">
        <label class="sr-only" for="exampleInputUsername">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Username or email">
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default">Sign in</button>
<?php echo form_close() ?>