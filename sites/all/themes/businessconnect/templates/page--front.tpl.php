<?php
	/**
	 * @package Business Connect Business Theme - Adodis Drupal Theme
	 * @version 1.1 April 28, 2011
	 * @author Adodis Theme http://www.drupal-themes.adodis.com
	 * @copyright Copyright (C) 2010 Adodis Drupal Theme
	 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
	 */
?>
<div id="wrapper">
	<div id="header-wrapper">
		<div class="header-banner">
		  <div id="header" class="section clearfix">
			   <!-- Logo -->
			   <?php if ($logo): ?>
			     <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
			       <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			     </a>
			   <?php endif; ?>
			   <?php if ($site_name): ?>
				 <?php if ($title): ?>
				   <div id="site-name">
					    <h1>
					     <strong>
					    	 <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
					   	 </strong>
					   </h1>
				   </div>
				 <?php else: ?>
				   <h1 id="site-name">
				    	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
				   </h1>
				 <?php endif; ?>
			   <?php endif; ?>

				   <!-- Header Right Area -->
				   <?php if($page['header_right']): ?>
					 <div id="header-right">
						  <div class="head-top-right">
						    <?php print render($page['header_right']); ?>
						  </div>
					 </div>
				   <?php endif; ?>

		  </div><!--header end-->

		<!-- Top Menu Navigation -->

		  <?php if($page['navigation']): ?>
			 <div id="menu" class="clearfix">
				<?php print render($page['navigation']); ?>
			 </div>
		  <?php endif; ?>

	</div> <!-- End Header Banner -->
	</div> <!-- End Header Wrapper -->


	<!-- Content Area -->
	<div id="content-wrapper">

	<!-- Main content area -->

	 <div id="middle-part-<?php print $switch_column; ?>" class="middle-part clearfix">

	    <!-- LEFT SIDEBAR  -->
		<?php if($page['sidebar_left']): ?>
			<div id="sidebar_left">
				<?php print render($page['sidebar_left']); ?>
			</div>
		<?php endif; ?>

		<!-- MIDDLE CONTENT -->
		<div id="main-content-<?php print $switch_column; ?>" class="main-content clearfix">

		<!-- Banner Area -->

			<?php if(theme_get_setting('slideshow')=='yes'): ?>
			<div class="slideshow-banner">
					 <div id="slideshow-area">
						  <div id="slideshow">
							<?php print render($slideshow); ?>
						  </div>
					  </div>
			</div>  <!-- End slideshow Banner -->
			<?php endif; ?>

			<div class = "content-bg">

				<?php if ($messages): ?>
				    <div id="messages"><div class="section clearfix">
				      <?php print $messages; ?>
				    </div></div> <!-- /.section, /#messages -->
			  	<?php endif; ?>

				<?php if ($breadcrumb): ?>
				      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
				<?php endif; ?>

				<?php print render($title_prefix); ?>
			      <?php if ($title): ?>
			        <h2 class="title" id="node-title">
			          <?php print $title; ?>
			        </h2>
			      <?php endif; ?>
			      <?php if ($tabs): ?>
			        <div class="tabs">
			          <?php print render($tabs); ?>
			        </div>
			      <?php endif; ?>

				<?php if ($action_links): ?>
			        <ul class="action-links">
			          <?php print render($action_links); ?>
			        </ul>
			      <?php endif; ?>

			     <?php print render($page['content']); ?>

			      <?php if($page['content_bottom']): ?>
			        <div id="content-bottom" class="services clearfix">
			          <?php print render($page['content_bottom']); ?>
			        </div>
			  	<?php endif; ?>

			</div>

			<!-- Userbox content -->

				<?php if($page['user1'] || $page['user2'] || $page['user3']): ?>
				<div id="user-position" class="clearfix <?php print $user_last; ?>">
							<?php if($page['user1']): ?>
						<div id="user-1">
							<div class="user_column_<?php print $user_column; ?>"><div class="user-column-inner">
								<?php print render($page['user1']); ?>
							</div></div>
						</div>
					<?php endif; if($page['user2']): ?>
						<div id="user-2">
							<div class="user_column_<?php print $user_column; ?>"><div class="user-column-inner">
								<?php print render($page['user2']); ?>
							</div></div>
						</div>
					<?php endif;  if($page['user3']): ?>
						<div id="user-3">
							<div class="user_column_<?php print $user_column; ?>"><div class="user-column-inner">
								<?php print render($page['user3']); ?>
							</div></div>
						</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

		</div> <!--  End of the Main Content -->


			<!-- RIGHT SIDEBAR  -->
			<?php if($page['sidebar_right']): ?>
				<div id="sidebar_right" class="clearfix">
					<?php print render($page['sidebar_right']); ?>
				</div>
			<?php endif; ?>

 	</div> <!-- End left, right sidebar's and content area End of main part-->
	</div> <!--  End Content Wrapper -->

	<!-- FOOTER -->
	<div id="footer">
	<div class = "page-center">

	<?php if ($page['footer-menu'] || $page['footer-content'] || $page['fcolumn1'] || $page['fcolumn2'] || $page['fcolumn3']): ?>

		<div id="footer-items" class="clearfix">

		<!-- footer item one -->
			<?php if($page['fcolumn1'] || $page['fcolumn2'] || $page['fcolumn3'] || $page['footer-menu']): ?>

				<div id="footer-menu">
					<div class="footer-item-<?php print $footer_items; ?>"><div class="footer-item-inner">

					<!--  User Positions -->
					<?php if($page['fcolumn1'] || $page['fcolumn2'] || $page['fcolumn3'] ): ?>

						<div id="fcolumn-position" class="clearfix" >
							<?php if($page['fcolumn1']): ?>
								<div id="fcolumn-1">
									<div class="fcolumn-column-<?php print $footer_column; ?>"><div class="fcolumn-column-inner">
										<?php print render($page['fcolumn1']); ?>
									</div></div>
								</div>
							<?php endif; if($page['fcolumn2']): ?>
								<div id="fcolumn-2">
									<div class="fcolumn-column-<?php print $footer_column; ?>"><div class="fcolumn-column-inner">
										<?php print render($page['fcolumn2']); ?>
									</div></div>
								</div>
							<?php endif; if($page['fcolumn3']): ?>
								<div id="fcolumn-3">
									<div class="fcolumn-column-<?php print $footer_column; ?>"><div class="fcolumn-column-inner">
										<?php print render($page['fcolumn3']); ?>
									</div></div>
								</div>
							<?php endif; ?>
						</div>

					<?php endif; ?>

					<?php if ($page['footer-menu']): ?>
						<div class = "footer-menu-content">
							<?php print render($page['footer-menu']); ?>
						</div>
					<?php endif; ?>

					</div>
				</div>
		</div>

		<!--footer item two-->
			<?php endif; if ($page['footer-content']): ?>
				<div id="footer-content">
					<div class="footer-item-<?php print $footer_items; ?>"><div class="footer-item-inner">
						<?php print render($page['footer-content']); ?>
					</div></div>
				</div>
			<?php endif; ?>
		</div>

	<?php endif; ?>

	    <!-- DO NOT REMOVE THIS CREDIT LINK. IF YOU WANT TO REMOVE, PLEASE CONTACT US -->
	   <!-- <div style="display: block;" class="credit">Designed by  <a href="http://www.drupal-themes.adodis.com">Drupal Themes</a></div> -->

	 </div>
	</div> <!-- End Footer -->

</div> <!--  End Wrapper -->
