var gulp 				= require('gulp');
var scss 				= require('gulp-sass');
var plumber 			= require('gulp-plumber');
var concat				= require('gulp-concat');
var uglify				= require('gulp-uglify');
var autoprefixer 		= require('gulp-autoprefixer');
var autoPrefixerBrowers = [
	'chrome >= 34',
	'safari >= 7',
	'opera >= 23',
	'ios >= 7',
	'android >= 4.0',
	'bb >= 10',
	'ie >= 10',
	'ie_mob >= 10',
	'ff >= 30'
];

/*
 * Compile SCSS files
 */
gulp.task('style', function () {
	gulp.src('resources/assets/scss/global.scss')
		.pipe(plumber())
		.pipe(scss())
		.pipe(autoprefixer(autoPrefixerBrowers))
		.pipe(gulp.dest('public/css'));
});

/*
 * Concat JS
 */
gulp.task('script', function() {
	gulp.src([
		'resources/assets/js/jquery-2.1.4.min.js',
		'resources/assets/js/jquery.bxslider.min.js',
		'resources/assets/js/sweetalert.min.js',
		'resources/assets/js/script.js',
	])
		.pipe(concat('script.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('public/js'));
});

/*
 * Watch Files
 */
gulp.task('watch', ['style'], function() {
	gulp.watch('resources/assets/scss/**/*', ['style']);
});
