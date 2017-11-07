<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-template
 */

get_header(); ?>

	<div class="content_area container">
		<main>
			<svg class="svg01">
				<use xlink:href="/wp-content/themes/wp-template/assets/svg/svg.svg#svg01">
			</svg>
			<img src="/wp-content/themes/wp-template/content/images/content_img_pc.png" width="100" class="switch">
			<img src="/wp-content/themes/wp-template/assets/images/assets_img_pc.png" width="100" class="switch">
			<div class="info_list">
				<?php query_posts('posts_per_page=3'); ?>
				<?php if (have_posts()) :while (have_posts()) :
				the_post();
				?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<div class="info_list_date"><?php echo get_the_date(); ?></div>
							<div class="info_list_text">
								<span class="text_overflow"><?php the_title(); ?></span>
							</div>
						</a>
					</article>
				<?php
				endwhile;
				else:
				?>
				<p>記事はありません</p>
				<?php endif; ?>
			</div>
		</main>
	</div>

<?php
get_footer();