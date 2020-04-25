<?php get_header(); ?>
<div class="internal-pages">
	<section class="search-result">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-11">
					<div class="results">
						<?php if (!have_posts()) : ?>
							<div class="not-found">
								<div class="content">
									<h1>OOPS <i class="fas fa-times-circle"></i></h1>
									<p>Sua busca não foi encontrada, desculpe.</p>
								</div>
							</div>
						<?php else : ?>
							<div class="results">
								<h1>Resultados da pesquisa:</h1>
								<ul class="list-unstyled">
									<?php while (have_posts()) : the_post(); ?>
										<a href="<?php the_permalink(); ?>">
											<li class="media">
												<img src="<?php echo (the_post_thumbnail_url()) ? the_post_thumbnail_url() : get_field('post_thumb'); ?>" alt="<?php echo get_the_title(); ?>">
												<div class="media-body">
													<h5><?php echo get_the_title(); ?></h5>
													<p class="post-author">Publicado em <?php echo get_the_date(); ?> por <i class="fas fa-user"></i> <?php echo get_the_author(); ?>.</p>
													<p class="resume"><?php echo wp_trim_words((get_the_content()) ? get_the_content() : get_the_excerpt(), 30, "..."); ?></p>
												</div>
											</li>
										</a>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="paginations">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<?php wp_pagenavi(); ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>