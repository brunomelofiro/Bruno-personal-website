
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

</div><!-- Close container -->
	<div class="footer-container" data-sticky-footer>
		<footer class="row footer">
			<!--?php dynamic_sidebar( 'footer-widgets' ); ?-->
			<div class="small-8 columns">
					<?php footer_nav() ?>
					<p class="copyright">Bruno Melofiro &copy; 2017</p>
			</div>

			<div class="small-4 columns end">
				<div class="sm-icon-container">
				<a href="https://github.com/brunomelofiro"  target="_blank"><img class="sm-icon" src="/wp-content/themes/FoundationPress/src/assets/images/icons/github-sign.svg" ></a>
				<a href="https://www.linkedin.com/in/bruno-melofiro-1a57ba29" target="_blank"><img class="sm-icon" src="/wp-content/themes/FoundationPress/src/assets/images/icons/linkedin-logo.svg"></a>
				<a href="https://twitter.com/brunomelofiro" target="_blank"><img class="sm-icon" src="/wp-content/themes/FoundationPress/src/assets/images/icons/twitter-sign.svg"></a>
			</div>
			</div>
			
		</footer>
	</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
