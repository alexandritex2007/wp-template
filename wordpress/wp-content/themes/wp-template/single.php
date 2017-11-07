<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp-template
 */

get_header(); ?>

	<div class="content-area">
		<main>
			<div class="second_cover">

			</div>
			<div class="breadcrumbs">
				<?php breadcrumb(); ?>
			</div>
			<article>
				<h1><?php the_title(); ?></h1>
				<?php
				$this_content= wpautop($post->post_content);
				echo $this_content;
				?>
			</article>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
