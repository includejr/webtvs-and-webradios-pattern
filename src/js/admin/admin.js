jQuery(document).ready(function ($) {
	/**
	 * Inicialização do Color Picker e Masked Input
	 */
	$('.color-field').wpColorPicker();
	$('.tel_footer').mask('(99) 99999-9999');

	/**
	 * Seletor de imagens para as logos
	 */
	// Logo desktop
	$('.header_logo_upload').click(function (e) {
		e.preventDefault();
		var custom_uploader = wp
			.media({
				title: 'Logo do Cabeçalho',
				button: {
					text: 'Enviar Imagem',
				},
				multiple: false, // Coloque em true para permitir selecionar múltiplos arquivos
			})
			.on('select', function () {
				var attachment = custom_uploader
					.state()
					.get('selection')
					.first()
					.toJSON();
				$('.header_logo').val(attachment.url);
			})
			.open();
	});

	// Logo mobile
	$('.header_logo_mb_upload').click(function (e) {
		e.preventDefault();
		var custom_uploader = wp
			.media({
				title: 'Logo do Cabeçalho',
				button: {
					text: 'Enviar Imagem',
				},
				multiple: false, // Coloque em true para permitir selecionar múltiplos arquivos
			})
			.on('select', function () {
				var attachment = custom_uploader
					.state()
					.get('selection')
					.first()
					.toJSON();
				$('.header_logo_mb').val(attachment.url);
			})
			.open();
	});

	// Logo footer
	$('.footer_logo_upload').click(function (e) {
		e.preventDefault();
		var custom_uploader = wp
			.media({
				title: 'Logo do Footer',
				button: {
					text: 'Enviar Imagem',
				},
				multiple: false, // Coloque em true para permitir selecionar múltiplos arquivos
			})
			.on('select', function () {
				var attachment = custom_uploader
					.state()
					.get('selection')
					.first()
					.toJSON();
				$('.footer_logo').val(attachment.url);
			})
			.open();
	});
});
