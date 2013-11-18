<div class="navbar navbar-fixed-top">  
	<div class="navbar-inner">  
		<div class="container">
        	<a data-target=".navbar-inverse-collapse" data-toggle="collapse" class="btn btn-navbar">
            	<span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</a>
		
			<div class="nav-collapse collapse navbar-inverse-collapse">  
				<ul class="nav">  
			  		<li><a href="<?php echo base_url('home')?>" class="brand"><?php echo $title ?></a></li>
			  		
					<?php 
						if (isset($menu) && $menu) {
							foreach($menu as $m) { ?>
								<li <?php if (isset($m['submenu'])) { ?> class="dropdown" <?php } ?>>
									<a <?php if (isset($m['submenu'])) { ?> href="#" class="dropdown-toggle" data-toggle="dropdown" <?php } else { ?> href="<?php echo base_url($m['controller'])?>" <?php } ?> >
										<?php echo $m['label'] ?> <?php if (isset($m['submenu'])) { ?> <b class="caret"></b> <?php } ?>
									</a>
									
									<?php if (isset($m['submenu'])) { ?>
						    			<ul class="dropdown-menu">
						    				<?php foreach($m['submenu'] as $sm) { ?>  
							     				<li><a href="<?php echo base_url($sm['controller']) ?>"><?php echo $sm['label'] ?></a></li>  
											<?php } ?>  
										</ul>  
									
									<?php } ?>
									
									
								</li>
					<?php 
							}
						}
					?>                    
			  		
			  		  
					<?php 
						if (isset($modules) && $modules) {
							foreach($modules as $module) { ?>
								<li <?php if ($active_module == $module) { ?> class="active" <?php } ?> ><a href="<?php echo base_url($module)?>"><?php echo $module ?></a></li>
					<?php 
							}
						}
					?>                    
				</ul>  
			
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">  
							<li><a href="<?php echo base_url('profile')?>">View profile</a></li>
							<li><a href="<?php echo base_url('settings')?>">Settings</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('logout')?>">Logout</a></li>
						</ul>
					</li>  
				</ul>  
	
				<form id="custom-search-form" class="form-search navbar-search pull-right">
				    <input type="text" class="search-query" placeholder="Search">
					<button type="submit" class="btn"><i class="icon-search"></i></button>
				</form>	
	<?php /*
				<form class="navbar-search pull-right">  
	  				<input type="text" class="search-query" placeholder="Search">  
				</form>  
	*/ ?>
			</div>
			
		</div>  
	</div>
	
	
	<?php if (isset($breadcrumb) && is_array($breadcrumb)): ?>
		<div class="navbar-inner navbar-inner-breadcrumb">  
			<div class="container">
				<ul class="breadcrumb">
					<?php $i = 0 ?>
					<?php foreach($breadcrumb as $b): ?>
						<?php if (isset($b['img']) && !empty($b['img'])): ?>
							<li class="img">
								<a href="<?php echo site_url($b['url']) ?>" alt="<?php echo $b['label'] ?>" title="<?php echo $b['label'] ?>" >
									<img src="<?php echo site_url('../assets/img/module/'.$b['img'].'.png') ?>" />
								</a>
							</li>
						<?php else: ?>
							<li <?php if (($i+1 == count($breadcrumb))): ?> class="active" <?php endif; ?> >
								<a href="<?php echo site_url($b['url']) ?>"><?php echo $b['label'] ?></a>
							</li>
						<?php endif; ?>
						
						<?php if ($i != 0 && ($i+1 < count($breadcrumb))): ?>
							<li class="divider">/</li>
						<?php endif; ?>
						
						<?php $i++ ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>	
	<?php endif; ?>
	  
</div>   