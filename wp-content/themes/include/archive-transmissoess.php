<?php get_header(); ?>
<div class="internal-pages">
  <section class="archive-result streams">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php if (!have_posts()) : ?>
            <div class="not-found">
              <div class="content">
                <h1>OOPS <i class="fas fa-times-circle"></i></h1>
                <p>Não encontramos nenhuma transmissão salva, desculpe.</p>
              </div>
            </div>
          <?php else : ?>
            <div class="results">
              <h1><?php echo post_type_archive_title( '', false ); ?></h1>
              <div class="stream-gallery">
                <?php while (have_posts()) : the_post(); ?>
                  <div class="stream">
                    <h5 class="stream-title"><?php echo get_the_title(); ?></h5>
                    <div class="stream-video">
                      <?php echo (!empty(get_field('embed'))) ? get_field('embed') : '<p>Link da transmissão não encontrado <i class="fas fa-exclamation-circle"></i>'; ?>
                    </div>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif; ?>
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