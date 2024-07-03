<?php
/*
Template Name: Шаблон по умолчанию
*/
get_header();
?>
<div class="container">
	<article>
		<div class="row">
			<div class="col-md-10">
				<h2><?php the_title() ?></h2>
				<?php the_content() ?>
			</div>
		</div>
	</article>
</div>
<?php
get_footer();
?>