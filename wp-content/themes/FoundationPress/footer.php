
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
		<footer class="footer">
			<!--?php dynamic_sidebar( 'footer-widgets' ); ?-->
			<div class="large-6 columns">
					<?php footer_nav() ?>
					<p>Bruno Melofiro &copy; 2017</p>
			</div>

			<div class="large-6 colums">

			</div>
		</footer>
	</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
