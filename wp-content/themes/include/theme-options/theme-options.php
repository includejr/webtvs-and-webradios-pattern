<style> .logo-thumb { width: 120px; } </style>
<div class="wrap">
	<?php if (isset($_GET['settings-updated'])) : ?>
		<div class="updated" id="message">
			<p><strong><?php _e('Alterações salvas.'); ?></strong></p>
		</div>
	<?php endif; ?>
	<h1><span class="dashicons dashicons-layout" style="font-size: 30px; width: auto; height: auto;"></span> Configurações do Tema</h1>
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'header_options'; ?>
		<h2 class="nav-tab-wrapper">
			<a href="?page=theme-config&tab=header_options" class="nav-tab <?php echo $active_tab == 'header_options' ? 'nav-tab-active' : ''; ?>">Cabeçalho</a>
			<a href="?page=theme-config&tab=home_options" class="nav-tab <?php echo $active_tab == 'home_options' ? 'nav-tab-active' : ''; ?>">Página Inicial</a>
			<a href="?page=theme-config&tab=footer_options" class="nav-tab <?php echo $active_tab == 'footer_options' ? 'nav-tab-active' : ''; ?>">Rodapé</a>
			<a href="?page=theme-config&tab=help_options" class="nav-tab <?php echo $active_tab == 'help_options' ? 'nav-tab-active' : ''; ?>">Ajuda</a>
			<a href="?page=theme-config&tab=about_options" class="nav-tab <?php echo $active_tab == 'about_options' ? 'nav-tab-active' : ''; ?>">Sobre</a>
		</h2>
		<?php 
			if ($active_tab !== 'help_options' && $active_tab !== 'about_options') {
				settings_fields($active_tab);
				do_settings_sections($active_tab);
			}
			include_once 'sections/' . explode('_', $active_tab)[0] . '-section.php';
			($active_tab !== 'help_options' && $active_tab !== 'about_options') ? submit_button() : ''; 
		?>
	</form>
</div>