
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS -->
    <?php foreach($css_files as $css_file):  ?>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/<?php echo $css_file ?>" type="text/css" media="all">
    <?php endforeach ?>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ie.css" type="text/css" media="all" />
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <?php $this->load->view('template_header.php', array('title' => $title)) ?>

    <div class="row">
        <div class="col-sm-8">

            <?php
            if ($page)
            {
                $this->load->view('pages/' . $page . '.php');
            }
            ?>
        </div>

        <div class="col-sm-4">

            <?php if ($logged_in): ?>
                <?php $this->load->view('modals/topic_create.php') ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>What is the<b>open</b>wall?</h4>
                            It's a place to share comments around topics. Start creating <a href="<?php echo base_url('topic/create') ?>">your first topic</a>.
                            <br/><br/>
                            <p>&copy; 2014 the<b>open</b>wall</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!--/row-->


    <footer>

    </footer>

</div><!--/.container-->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php foreach($js_external_files as $js_file):  ?>
    <script type="text/javascript" src="<?php echo $js_file ?>"></script>
<?php endforeach ?>

<?php foreach($js_files as $js_file):  ?>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/<?php echo $js_file ?>"></script>
<?php endforeach ?>

</body>
</html>
