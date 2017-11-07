<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp-template
 */

get_header(); ?>

	<div class="content_area">
		<main>
			<div class="error-404 not-found mt60 pt70 pb70 sp_mt10 sp_pt20 sp_pb20 align_center">
				<p class="error-404_heading mb20">404 Not Found</p>
				<?php get_search_form(); ?>
			</div>
		</main>
	</div>

<?php
get_footer();