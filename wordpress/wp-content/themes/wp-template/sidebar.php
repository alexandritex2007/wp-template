<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-template
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside>
	<?php get_search_form(); ?>
	<!--最近の投稿-->
	<?php
	$args = array('posts_per_page' => 5, 'offset' => 0, 'order' => 'DESC', 'orderby' => 'date');
	$newpost_query = new WP_Query($args);
	?>
	<?php if ($newpost_query->have_posts()): ?>
		<div class="side_category">
			<h2 class="side_category_heading">新着記事</h2>
			<ul class="side_category_content">
			<?php while ($newpost_query->have_posts()): $newpost_query->the_post(); ?>
				<li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	<!--最近の投稿END-->

	<div class="side_category">
		<h2 class="side_category_heading">カテゴリーで絞り込む</h2>
		<ul class="side_category_content"><?php wp_list_categories('title_li='); ?></ul>
	</div>

	<div class="side_tag">
		<h2 class="tagcloud_heading"><i class="icon icon-price-tag"></i>タグで絞り込む</h2>
		<div class="tagcloud">
			<?php wp_tag_cloud(); ?>
		</div>
	</div>
</aside>