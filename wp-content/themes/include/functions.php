<?php
	/**
	 * Incluindo classe de dropdown dinâmico com bootstrap e retirando a Admin Bar do site
	 */
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	add_filter('show_admin_bar', '__return_false');
	
	/**
	 * Limpeza do header
	 */
	function clean_header() {
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'clean_header');

	/**
	 * Configurações dos posts
	 */
	// Seta o número de visualizações dos posts
	function set_post_views($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}

	// Pega a ID do post
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	function track_post_views($post_id) {
		if (!is_single()) {
			return;
		}
		if (empty($post_id)) {
			global $post;
			$post_id = $post->ID;    
		}
		set_post_views($post_id);
	}
	add_action('wp_head', 'track_post_views');

	// Retorna a quantidade de visualizações dos posts
	function get_post_views($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if ($count == ''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return 'Nenhuma visualização.';
		}
		return $count . ' visualizações.';
	}

	/**
	 * Configurações do tema
	 */
	// Definiciões básicas: adiciona suporte ao título da aba, imagens destacadas e registra menus
	function theme_config() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'header_menu' => __('Menu Principal (topo/cabeçalho)', 'include'),
			'footer_menu' => __('Mapa do Site', 'include'),
		));
	}
	add_action('after_setup_theme', 'theme_config');

	// Defini a cor da borda inferior de cada item no menu principal 
	function custom_wp_nav_menu_objects($items, $args) {
		foreach ($items as $item) {
			$cor_borda = get_field('cor_borda', $item);
			$style = [
				'item' 		=> '.header-nav ul li#menu-item-'. $item->ID .':hover { border-bottom-color: '. $cor_borda .'; }',
				'subitem' => '.header-nav ul li#menu-item-'. $item->ID .'.dropdown ul li { border-bottom-color: '. $cor_borda .'; }',
			];
			$item->title .= '<style>'. $style['item'] . $style['subitem'] .'</style>';            
		}
		return $items;
	}
	add_filter('wp_nav_menu_objects', 'custom_wp_nav_menu_objects', 10, 2);

	// Limita o tamanho de upload de imagens a 2 KB
	function limit_image_size($file) {
		$image_size = $file['size']/1024;
		$limit = 2048;
		$is_image = strpos($file['type'], 'image');
		if ( ( $image_size > $limit ) && ($is_image !== false) )
			$file['error'] = 'Your picture is too large. It has to be smaller than '. $limit .'KB';
		return $file;
	}
	add_filter('wp_handle_upload_prefilter', 'limit_image_size');

	// Retorna os argumentos para criar os menus
	function get_menu_args($theme) {
		$args = [
			'theme_location'  => $theme,
			'depth'	          => 2,
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),
		];
		return $args;
	}

	/**
	 * Custom Theme Configs
	 */
	// Adicionando página ao menu
	function options_page() {
		$page_title = 'Confirugações do Tema';
		$menu_title = 'Configurações do Tema';
		$capability = 'manage_options';
		$menu_slug = 'theme-config';
		$function = 'theme_options_page';
		$icon = 'dashicons-layout';
		$position = 79;
		add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon, $position);
		add_submenu_page( $menu_slug, 'Cabeçalho', 'Cabeçalho', $capability, $menu_slug, $function);
		add_submenu_page( $menu_slug, 'Página Inicial', 'Página Inicial', $capability, 'theme-config&tab=home_options', $function);
		add_submenu_page( $menu_slug, 'Rodapé', 'Rodapé', $capability, 'theme-config&tab=footer_options', $function);
		add_submenu_page( $menu_slug, 'Ajuda', 'Ajuda', $capability, 'theme-config&tab=help_options', $function);
		add_submenu_page( $menu_slug, 'Sobre', 'Sobre', $capability, 'theme-config&tab=about_options', $function);
	}
	add_action('admin_menu', 'options_page');
		
	// Incluindo página de opções
	function theme_options_page() {
		require(dirname( __FILE__ ) . '/theme-options/theme-options.php');
	}

	// Registrando opções
	function register_theme_options() {
		// Header Options
		register_setting('header_options', 'header_logo');
		register_setting('header_options', 'header_logo_mb');
		register_setting('header_options', 'social_fb');
		register_setting('header_options', 'social_insta');
		register_setting('header_options', 'social_yt');
		// Home Options
		register_setting('home_options', 'ult_noticias_border');
		register_setting('home_options', 'destaques_border');
		register_setting('home_options', 'eventos_border');
		register_setting('home_options', 'fb_widget_border');
		register_setting('home_options', 'fb_widget');
		register_setting('home_options', 'fb_widget_tabs');
		// Footer Options
		register_setting('footer_options', 'footer_logo');
		register_setting('footer_options', 'text_footer');
		register_setting('footer_options', 'tel_footer_1');
		register_setting('footer_options', 'tel_footer_2');
		register_setting('footer_options', 'email_footer');
		register_setting('footer_options', 'endereco_footer');
	}
	add_action('admin_init', 'register_theme_options');
		
	// Função de carregar a funcionalidade de salvar as imagens
	function header_logo_upload() {
		if (function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}
	add_action('admin_init', 'header_logo_upload');

	/**
	 * Scripts
	 */
	// Adicionar scripts no painel
	function add_admin_scripts($hook) {
		if (is_admin()) {
			if ('edit.php' == $hook) {
					return;
			}
			wp_enqueue_style('dashicons');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script("admin-script", get_template_directory_uri() . "/dist/js/admin/admin.min.js", array( 'wp-color-picker' ), null, true);
		}
	}
	add_action('admin_enqueue_scripts', 'add_admin_scripts');

	// Adicionar scripts no tema
	function add_theme_scripts() {
		wp_enqueue_style("main-style", get_stylesheet_uri(), false, null);
		wp_enqueue_script("main-script", get_template_directory_uri() . "/dist/js/main.min.js", false, null, true);
	}
	add_action('wp_enqueue_scripts', "add_theme_scripts");