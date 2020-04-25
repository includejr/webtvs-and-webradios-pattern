jQuery(document).ready(function ($) {
	/**
	 * Conserta o elemento title dos itens da navbar
	 * Obs.: os ids de cada menu sempre variam, então certifique de trocá-los abaixo
	 */
	var menus = [
		'#menu-menu-principal-topo li a',
		'#menu-menu-principal-topo-1 li a',
		'#menu-menu-secundario-rodape li a',
	];
	menus.map(function (id) {
		$(id).map(function () {
			var title = $(this).attr('title');
			$(this).attr('title', title.substr(0, title.indexOf('.')));
		});
	});

	/**
	 * Funções de manipulação do menu mobile
	 */
	// Abrir
	$('.mobile-header .sidemenu-cta .open').click(function () {
		$('.mobile-sidemenu').css('right', '0%');
	});
	// Fechar
	$('.mobile-sidemenu .sidemenu-cta .close').click(function () {
		$('.mobile-sidemenu').css('right', '100%');
	});

	/**
	 * Funções de manipulação da searchbar mobile
	 */
	// Abrir
	$('.mobile-header .search-cta a').click(function () {
		if ($(this).attr('class') === 'open') {
			$('.mobile-search').css('bottom', '0');
			$(this).attr('class', 'close');
			$(this).children().attr('class', 'fas fa-times');
		} else {
			$('.mobile-search').css('bottom', '-11%');
			$(this).attr('class', 'open');
			$(this).children().attr('class', 'fas fa-search');
		}
	});

	/**
	 * Inicializa e configura os carrosséis
	 */
	// Carrosel de notícias em destaques no social-header
	var socialHeaderOwl = $('.highlights-news .owl-carousel');
	socialHeaderOwl.owlCarousel({
		items: 1,
		loop: true,
		dots: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
	});

	// Configuração de todos os carroséis de anúncios
	var adBanners = $('.owl-carousel.ad-banners');
	adBanners.owlCarousel({
		items: 1,
		loop: true,
		dots: false,
		autoplay: true,
		autoplayTimeout: 6000,
		autoplayHoverPause: true,
	});

	// Configuração específica aos anúncios da lateral
	var sideAds = $('.side-ads .owl-carousel');
	sideAds.owlCarousel({
		items: 1,
		loop: true,
		dots: false,
		autoplay: true,
		autoplayTimeout: 6000,
		autoplayHoverPause: true,
	});

	// Configuração dos cards de eventos
	var eventsCards = $('.events .owl-carousel');
	eventsCards.owlCarousel({
		items: 4,
		loop: true,
		dots: true,
		margin: 10,
		stagePadding: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			},
			353: {
				items: 2,
			},
			425: {
				items: 3,
			},
			768: {
				items: 2,
			},
			992: {
				items: 4,
			},
		},
	});
});
