<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-template
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div <?php post_class('content_area'); ?>>
		<main role="main">
			<div class="second_cover">
				<h1><?php the_title(); ?></h1>
			</div>
			<?php breadcrumb(); ?>

			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sample' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</main>
	</div>
</article>
