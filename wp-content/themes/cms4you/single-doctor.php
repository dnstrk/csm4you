<?php
/*
Template Name: Single
*/
get_header();
?>
<div class="tg-page_specialist">
    <div class="tg-container">
        <div class="tg-page_specialist-wrap">
			<div class="specialist-wrap__head">
				<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
				<h3><?php the_title() ?></h3>
				<p><?php echo esc_attr(get_the_excerpt()) ?></p>
			</div>
			<div class="specialist-wrap__bottom">
				<?php the_content() ?>
			</div>
			<button class="tg-page_specialist__btn btn-blue-def">Записаться к специалисту</button>

		</div>
	</article>
</div>
</div>
</div>
<?php
get_footer();
?>