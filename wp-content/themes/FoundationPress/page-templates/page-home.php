<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<!--?php get_template_part( 'template-parts/featured-image' ); ?-->
<script src="wp-content/themes/FoundationPress/node_modules/jquery-parallax.js/parallax.min.js"></script>

<div class="full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php
		$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
		if($image) :
		 ?>
		<header>
		<div class="hero-img" data-parallax="scroll" data-image-src="<?php echo $image ?>">
			<div style="width:100%; height:25rem;"></div>
		</div>
		</header>
	<?php endif; ?>

		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php do_action( 'foundationpress_page_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_page_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_footer();
