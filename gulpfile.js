const { src, dest, series, parallel, watch } = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const clean = require('gulp-clean');
const merge = require('merge-stream');
const imagemin = require('gulp-imagemin');

const dist = 'wp-content/themes/include/dist';
const cssFiles = [
	'node_modules/@fortawesome/fontawesome-free/css/all.css',
	'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
];
const sassFiles = [
	'src/modules/OwlCarousel2-2.3.4/src/scss/owl.carousel.scss',
	'src/modules/OwlCarousel2-2.3.4/src/scss/owl.theme.default.scss',
	'node_modules/bootstrap/scss/bootstrap.scss',
	'src/sass/style.scss',
];
const adminJSFiles = ['src/js/jquery.maskedinput.js', 'src/js/admin/admin.js'];
const mainJSFiles = [
	'node_modules/jquery/dist/jquery.js',
	'node_modules/popper.js/dist/umd/popper.js',
	'node_modules/bootstrap/dist/js/bootstrap.js',
	'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
	'src/modules/OwlCarousel2-2.3.4/dist/owl.carousel.js',
	'src/js/main.js',
];

function cleanImages(cb) {
	return src(`${dist}/images/*`).pipe(clean());

	cb();
}

function cleanFonts(cb) {
	return src(`${dist}/fonts/**/*`).pipe(clean());

	cb();
}

function cleanWebfonts(cb) {
	return src(`${dist}/webfonts/*`).pipe(clean());

	cb();
}

function cleanDist(cb) {
	return src(
		[
			`${dist}/css/*`,
			`${dist}/js/*`,
			`${dist}/fonts/**`,
			`${dist}/images/*`,
			`${dist}/webfonts/*`,
		],
		{ read: false }
	).pipe(clean());

	cb();
}

function transpileSass() {
	return merge(
		src(cssFiles).pipe(cleanCSS()),

		src(sassFiles).pipe(
			sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError)
		)
	)
		.pipe(sourcemaps.init())
		.pipe(concat('style.min.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(`${dist}/css`));
}

function transpileSassToProd() {
	return merge(
		src(cssFiles).pipe(cleanCSS()),

		src(sassFiles).pipe(
			sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError)
		)
	)
		.pipe(concat('style.min.css'))
		.pipe(dest(`${dist}/css`));
}

function buildAdminJs() {
	return src(adminJSFiles, { sourcemaps: true })
		.pipe(uglify())
		.pipe(concat('admin.min.js'))
		.pipe(dest(`${dist}/js/admin`, { sourcemaps: '.' }));
}

function buildAdminJsToProd() {
	return src(adminJSFiles)
		.pipe(uglify())
		.pipe(concat('admin.min.js'))
		.pipe(dest(`${dist}/js/admin`));
}

function buildMainJs() {
	return src(mainJSFiles, { sourcemaps: true })
		.pipe(uglify())
		.pipe(concat('main.min.js'))
		.pipe(dest(`${dist}/js`, { sourcemaps: '.' }));
}

function buildMainJsToProd() {
	return src(mainJSFiles)
		.pipe(uglify())
		.pipe(concat('main.min.js'))
		.pipe(dest(`${dist}/js`));
}

function buildImages() {
	return src('src/images/*')
		.pipe(
			imagemin(
				[
					imagemin.mozjpeg({ quality: 75 }),
					imagemin.optipng({ optimizationLevel: 5 }),
				],
				{ verbose: true }
			)
		)
		.pipe(dest(`${dist}/images`));
}

function buildFonts() {
	return src('src/fonts/**/*').pipe(dest(`${dist}/fonts`));
}

function buildWebfonts() {
	return src('node_modules/@fortawesome/fontawesome-free/webfonts/*').pipe(
		dest(`${dist}/webfonts`)
	);
}

function watchFiles() {
	// SASS
	watch('src/sass/*.scss', transpileSass);

	// JS
	watch('src/js/*.js', buildMainJs);
	watch('src/js/admin/*.js', buildAdminJs);

	// Images
	watch('src/images/*', series(cleanImages, buildImages));

	// Fonts
	watch('src/fonts/**/*', series(cleanFonts, buildFonts));

	// Webfonts
	watch('src/webfonts/**/*', series(cleanWebfonts, buildWebfonts));
}

exports.dev = series(
	cleanDist,
	parallel(
		transpileSass,
		parallel(buildAdminJs, buildMainJs),
		buildImages,
		buildFonts,
		buildWebfonts
	),
	watchFiles
);

exports.build = series(
	cleanDist,
	parallel(
		transpileSassToProd,
		parallel(buildAdminJsToProd, buildMainJsToProd),
		buildImages,
		buildFonts,
		buildWebfonts
	)
);
