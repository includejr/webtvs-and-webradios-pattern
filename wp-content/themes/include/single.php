<?php get_header(); ?>
	<?php if (get_field('imagem_interna')) : ?>
		<div class="post-thumbnail" style="background-image: url('<?php echo get_field('imagem_interna'); ?>');"></div>
	<?php endif; ?>
	<div class="internal-pages">
		<section class="post-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-7">
						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
							<?php if (function_exists('bcn_display')) { bcn_display(); } ?>
						</div>
						<div class="content">
							<h1><?php echo get_the_title(); ?></h1>
							<p class="post-author">Publicado em <?php echo get_the_date(); ?> por <i class="fas fa-user"></i> <?php echo get_the_author(); ?>.</p>
							<div class="text">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="most-popular">
							<h2>Mais Vistos</h2>
							<?php
								$mosts_viewds = new WP_Query(array(
									'posts_per_page' 	=> 4,
									'meta_key' 				=> 'post_views_count',
									'order_value'			=> 'meta_value_num',
									'order' 					=> 'DESC'
								));
								while ($mosts_viewds->have_posts()) : $mosts_viewds->the_post();
							?>
								<a href="<?php the_permalink(); ?>">
									<div class="card">
										<img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php echo get_the_title(); ?>">
										<div class="card-img-overlay">
											<h5 class="card-title"><?php echo get_the_title(); ?></h5>
										</div>
									</div>
								</a>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>