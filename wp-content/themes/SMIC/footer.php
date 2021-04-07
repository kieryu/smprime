
	<a id="back-to-top"><i class="fa fa-chevron-up"></i></a>
		
	
	<footer class="site-footer">
		<div class="smph-container">
			
			<div class="row">
				
				<div class="logo-wrapper col-md-12">
          <?php 
            if(function_exists('the_custom_logo')) {
              the_custom_logo();
            }
          ?>
				</div>

				<div class="col-md-3 footer-details">
					<h6 class="title">Corporate Address</h6>
					<address class="mb-0">10/F Mall of Asia Arena Annex Building, <br/>Coral Way cor. J.W. Diokno Boulevard, <br/>Mall of Asia Complex, <br/>1300 Pasay City, <br/>Philippines</address>
 
				</div>

				<div class="col-md-3 footer-details">
					<h6 class="title">Quick Links</h6>
          <?php 
            wp_nav_menu(
              array (
                'menu' => 'quicklinks',
                'container' => '',
                'theme_location' => 'quicklinks',
                'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
              )
            );
          ?>
				</div>

				<div class="col-md-3 footer-details">
					<!-- <a href="https://www.sminvestments.com/media" class="footer-link big-link mt-0">Media</a> -->
          <?php 
            wp_nav_menu(
              array (
                'menu' => 'footer_third_menu',
                'theme_location' => 'footer_third_menu',
                'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
              )
            );
          ?>
					<!-- <a href="#" class="footer-link">Stories</a>
					<a href="#" class="footer-link">Multimedia</a>
					<a href="#" class="footer-link">Social Media</a> -->
				</div>

				<div class="col-md-3 footer-details">
          <?php 
            // wp_nav_menu(
            //   array (
            //     'menu' => 'footer_fourth_menu',
            //     'theme_location' => 'footer_fourth_menu',
            //     'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
            //   )
            // );
          ?>
          <p><a class="title" href="tel:88311000">(02) 8831-1000</a></p>
          <p><a class="title" href="mailto:info@smprime.com">info@smprime.com</a></p>
				</div>

				<!-- <div class="offset-md-6 col-md-3 footer-sm">
					<h6 class="title">Connect With Us</h6>
          <?php 
            // wp_nav_menu(
            //   array (
            //     'menu' => 'sm_footer',
            //     'theme_location' => 'sm_footer',
            //     'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
            //   )
            // );
          ?>
				</div> -->

				<div class="col-md-12 copyright">
					<p class="copyright">&copy; SM Prime Holdings, Inc. 2020</p>
				</div>

			</div>

		</div>
	</footer>


		<?php wp_footer(); ?>
	</body>
</html>