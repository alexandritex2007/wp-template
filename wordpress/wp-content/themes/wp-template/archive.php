<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-template
 */

get_header(); ?>

	<div class="content_area">
		<div class="breadcrumbs">
			<?php breadcrumb(); ?>
		</div>
		<main>
			<?php query_posts('posts_per_page=1&paged='. $paged); ?>
			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			<!-- paging -->
			<?php
				$big = 9999999999;
				$arg = array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'current' => max( 1, get_query_var('paged') ),
					'total'   => $wp_query->max_num_pages
				);
				echo paginate_links($arg);
			?>
			<!-- paging -->

		</main>
	</div>

<?php
get_sidebar();
get_footer();