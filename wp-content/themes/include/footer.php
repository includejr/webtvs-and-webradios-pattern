		<?php wp_footer(); ?>
		<footer>
			<div class="menu">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-3">
							<?php if (get_option('footer_logo')) : ?>
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo get_option('footer_logo'); ?>" class="img-fluid" alt="TV Tabuleirense">
								</a>
							<?php endif; ?>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<h1>Mapa do Site</h1>
							<nav>
								<?php
									$args = get_menu_args('footer_menu');
									wp_nav_menu($args);
								?>
							</nav>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<h1>Contato</h1>
							<ul>
								<li><a href="tel:+55<?php echo get_option('tel_footer_1'); ?>"><?php echo get_option('tel_footer_1'); ?></a></li>
								<li><a href="tel:+55<?php echo get_option('tel_footer_2'); ?>"><?php echo get_option('tel_footer_2'); ?></a></li>
								<li><a href="mailto:<?php echo get_option('email_footer'); ?>"><?php echo get_option('email_footer'); ?></a></li>
							</ul>
						</div>
						<div class="col-12 col-sm-4 col-lg-3">
							<h1>Endereço</h1>
							<p><?php echo get_option('endereco_footer'); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="copyright-text">
								<span><?php echo get_option('text_footer'); ?></span>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="signature">
								<a href="https://www.includejr.com.br" target="_blank">
									<img src="<?php echo home_url(); ?>/wp-content/themes/include/dist/images/logo-include.png" class="img-fluid" alt="IncludeJr">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="search">
			<?php get_search_form(); ?>
		</div>          
	</body>
</html>