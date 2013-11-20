<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
		
		<?php foreach($css_files as $css_file):  ?>
			<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/<?php echo $css_file ?>" type="text/css" media="all">
		<?php endforeach ?>
		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ie.css" type="text/css" media="all" />		
		<![endif]-->
    
		<?php foreach($fonts as $font):  ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $font ?>">
		<?php endforeach ?>	
		
	</head>
	<body>
		
		<?php $this->load->view('template_header.php', array('title' => $title, 'logged_in' => $logged_in, 'username' => $username)) ?>


        <button type="button" class="btn btn-default">Create topic</button>

		<div class="container container-page">
			<div class="row">
  				<div class="span9">
					<?php
						if ($page)
						{ 
							$this->load->view('pages/' . $page . '.php');
						}
					?>  				
  				</div>
  				<div class="span2"></div>
			</div>		
		</div>
		
		<?php foreach($js_external_files as $js_file):  ?>
			<script type="text/javascript" src="<?php echo $js_file ?>"></script>
		<?php endforeach ?>
		
		<?php foreach($js_files as $js_file):  ?>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/<?php echo $js_file ?>"></script>
		<?php endforeach ?>
		
			
	</body>
</html>