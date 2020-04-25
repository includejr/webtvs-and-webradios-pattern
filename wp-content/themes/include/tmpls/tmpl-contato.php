<?php
  /**
   * Template Name: Página de contato
   */
  get_header();
?>
<div class="page-interna">
  <section class="page contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org">
						<?php if (function_exists('bcn_display')) { bcn_display(); } ?>
					</div>
          <div class="content">
            <div class="info">
              <img src="<?php echo home_url(); ?>/wp-content/themes/include/dist/images/contato.png" class="img-fluid" alt="Contato">
            </div>
            <div class="form">
              <h1>Entre em contato!</h1>
              <?php echo do_shortcode('[contact-form-7 id="102" title="Formulário de contato"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>