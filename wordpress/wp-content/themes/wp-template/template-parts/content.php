<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-template
 */

?>

<article><a href="<?php the_permalink(); ?>">
	<section>
		<div class="media">
			<div class="media_left">
				<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(array(154, 154)); ?>
				<?php else: ?>
					<img src="" alt="" width="154" height="101">
				<?php endif; ?>
			</div>
			<div class="media_body">
				<h2 class="text_overflow"><?php the_title(); ?></h2>
				<p class="media_list_date"><?php echo get_the_date(); ?></p>

				<?php
				$posttags = get_the_tags();
				if ($posttags) {
					echo '<p class="tagArea">';
					foreach($posttags as $tag) {
						echo $tag->name . ' ';
					}
					echo '</p>';
				}
				?>
				<p>
					<?php remove_filter('the_excerpt', 'wpautop'); ?>
					<?php the_excerpt(); ?>
				</p>
			</div>
		</div>
	</section>
</a></article>