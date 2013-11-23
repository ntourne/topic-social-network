<div class="navbar navbar-fixed-top navbar-inverse topics-navbar" role="navigation">
    <div class="container">
        <div class="navbar-header col-sm-8">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('home') ?>">the<b>open</b>wall</a>

            <div class="col-sm-8 col-md-8 pull-left">
                <?php echo form_open('search', array("method" => "get", "class" => "navbar-form", "role" => "search")); ?>
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search topics, categories and people">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                <?php echo form_close() ?>
            </div>
            <div class="col-sm-2 col-md-2 pull-left">
                <button class="btn btn-primary btn-oldstyle pull-right create-topic" data-toggle="modal" data-target="#create-topic-modal">
                    <span class="glyphicon glyphicon-check"></span> Create topic
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($logged_user) && $logged_user): ?>
                    <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                    <li><a href="<?php echo base_url('inbox') ?>">Inbox <span class="badge">0</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $logged_user['username'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('profile') ?>">Edit profile</a></li>
                            <li><a href="<?php echo base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo base_url('login')?> ">Login or Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->
