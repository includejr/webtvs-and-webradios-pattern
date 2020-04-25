<?php get_header(); ?>
<div class="internal-pages">
	<section class="page">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org">
						<?php if (function_exists('bcn_display')) { bcn_display(); } ?>
					</div>
					<div class="content">
						<h1><?php echo get_the_title(); ?></h1>
						<div class="text">
							<?php echo get_the_content(); ?>
							<?php echo do_shortcode('[Sassy_Social_Share title="Compartilhe para outras pessoas:"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>