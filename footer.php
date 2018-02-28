<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Daneh
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="social">
				<ul>
				<?php if (get_field( 'google', 'options' )): ?>
					<li><a href="<?php echo get_field( 'google', 'options' ); ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if (get_field( 'facebook', 'options' )): ?>
					<li><a href="<?php echo get_field( 'facebook', 'options' ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if (get_field( 'instagram', 'options' )): ?>
					<li><a href="<?php echo get_field( 'instagram', 'options' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if (get_field( 'twitter', 'options' )): ?>
					<li><a href="<?php echo get_field( 'twitter', 'options' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if (get_field( 'tumblr', 'options' )): ?>
					<li><a href="<?php echo get_field( 'tumblr', 'options' ); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
				<?php endif; ?>
				<?php if (get_field( 'youtube', 'options' )): ?>
					<li><a href="<?php echo get_field( 'youtube', 'options' ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
				<?php endif; ?>
					<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/001-mastercard.svg" width="24" alt=""></li>
					<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/002-business.svg" width="24" alt=""></li>
				</ul>
			</div>

			<div class="footer-links">

				<p>&copy; <?php echo date("Y"); ?> <?php echo bloginfo("name"); ?></p>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'footer-menu',
					) );
				?>

			</div>

		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
