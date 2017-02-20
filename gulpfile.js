var gulp           = require('gulp'),
		gutil          = require('gulp-util' ),
		sass           = require('gulp-sass'),
		browserSync    = require('browser-sync'),
		concat         = require('gulp-concat'),
		uglify         = require('gulp-uglify'),
		cleanCSS       = require('gulp-clean-css'),
		rename         = require('gulp-rename'),
		del            = require('del'),
		imagemin       = require('gulp-imagemin'),
		cache          = require('gulp-cache'),
		autoprefixer   = require('gulp-autoprefixer'),
		bourbon        = require('node-bourbon'),
		ftp            = require('vinyl-ftp'),
		coffee		   = require('gulp-coffee'),
		notify         = require("gulp-notify"),
		plumber        = require("gulp-plumber"),
		include        = require("gulp-include");

gulp.task('coffee', function(){
	return gulp.src('resources/assets/coffee/*.coffee')
		.pipe(include())
        .on('error', console.log)
        .pipe(plumber())
		.pipe(coffee({bare:true}))
		.pipe(concat('common.js'))
		.pipe(gulp.dest('public/js/'))
        .pipe(browserSync.reload({stream: true}));
});

// Scripts
gulp.task('scripts', function() {
	return gulp.src([
		'resources/assets/libs/js/*.js'
		])
	.pipe(concat('scripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('public/js'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'harvest:81',
		notify: false
	});
});

gulp.task('css', function(){
	return gulp.src([
        'resources/assets/libs/css/*.css'

	])
		.pipe(concat('libs.min.css'))
		.pipe(cleanCSS())
		.pipe(gulp.dest('public/css'))
});

gulp.task('sass', function() {
	return gulp.src('resources/assets/custom_sass/*.sass')
	.pipe(sass({
		includePaths: bourbon.includePaths
	}).on("error", notify.onError()))
	//.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer(['last 15 versions']))
	//.pipe(cleanCSS())
	.pipe(gulp.dest('./public/css'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['sass', 'scripts', 'browser-sync'], function() {
	gulp.watch('resources/assets/custom_sass/*.sass', ['sass']);
	gulp.watch(['libs/**/*.js', 'app/js/common.js'], ['scripts']);
	gulp.watch('app/*.html', browserSync.reload);
	gulp.watch(['resources/assets/coffee/*.coffee'], ['coffee']);
	gulp.watch(['app/**/*.php', 'routes/*.php', 'resources/**/*.php'], browserSync.reload);
});

gulp.task('imagemin', function() {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin()))
	.pipe(gulp.dest('dist/img')); 
});

gulp.task('build', ['removedist', 'imagemin', 'sass', 'scripts'], function() {

	var buildFiles = gulp.src([
		'app/*.html',
		'app/.htaccess',
		]).pipe(gulp.dest('dist'));

	var buildCss = gulp.src([
		'app/css/main.min.css',
		]).pipe(gulp.dest('dist/css'));

	var buildJs = gulp.src([
		'app/js/scripts.min.js',
		]).pipe(gulp.dest('dist/js'));

	var buildFonts = gulp.src([
		'app/fonts/**/*',
		]).pipe(gulp.dest('dist/fonts'));

});

gulp.task('deploy', function() {

	var conn = ftp.create({
		host:      'hostname.com',
		user:      'username',
		password:  'userpassword',
		parallel:  10,
		log: gutil.log
	});

	var globs = [
	'dist/**',
	'dist/.htaccess',
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('/path/to/folder/on/server'));

});

gulp.task('removedist', function() { return del.sync('dist'); });
gulp.task('clearcache', function () { return cache.clearAll(); });

gulp.task('default', ['watch']);
