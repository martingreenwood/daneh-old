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
