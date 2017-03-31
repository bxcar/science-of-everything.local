var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var watch = require('gulp-watch');
var browserSync = require('browser-sync');
var del = require('del');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var cache = require('gulp-cache');
var autoprefixer = require('gulp-autoprefixer');
var pug = require('gulp-pug');
var concatCss = require('gulp-concat-css');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var uglify = require('gulp-uglifyjs');

gulp.task('sass', function () {
	gulp.src('app/sass/*.+(scss|sass)')
	.pipe(plumber())
	.pipe(sass({errLogToConsole: true,
		includePaths: [require("bourbon-neat").includePaths,
		require("bourbon").includePaths,
    'app/libs/foundation-sites/scss'
		]}))
    .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
	.pipe(gulp.dest('app/css'))
	.pipe(browserSync.reload({stream: true}))
});

gulp.task('pug', function buildHTML() {
  return gulp.src('app/pug/*.pug')
	.pipe(plumber())
  .pipe(pug({pretty: '  '}))
	// .pipe(plumber.stop())
  .pipe(gulp.dest('app'))
    // .pipe(browserSync.reload({stream: true}))
});

gulp.task('scripts', function() {
  return gulp.src([
    'app/libs/jquery/dist/jquery.min.js',
    'app/libs/jquery-ui-1.12.1.custom/jquery-ui.min.js',
		// 'app/libs/datepicker-ru.js',
    // 'app/libs/bootstrap/dist/js/bootstrap.min.js',
    // 'app/libs/waypoints/lib/jquery.waypoints.min.js',
    'app/libs/OwlCarousel2-2.2.0/dist/owl.carousel.min.js',
		'app/libs/magnific-popup/dist/jquery.magnific-popup.min.js'
    ])
    .pipe(concat('libs.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('app/js'));
});

gulp.task('css-libs', ['sass'], function() {
   return gulp.src([
		// 'app/libs/icomoon/style.css',
    'app/libs/jquery-ui-1.12.1.custom/jquery-ui.min.css',
    'app/libs/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css',
    'app/libs/OwlCarousel2-2.2.0/dist/assets/owl.carousel.min.css',
		'app/libs/magnific-popup/dist/magnific-popup.css',
    'app/libs/animate.min.css'
    ])
    .pipe(concatCss("libs.min.css"))
    .pipe(cssnano())
    .pipe(gulp.dest('app/css'));
});

gulp.task('browser-sync', function() {
  browserSync({
    server: {
      baseDir: 'app'
    },
    notify: false
  });
});

gulp.task('watch', ['browser-sync', 'pug', 'sass', 'css-libs', 'scripts'], function(){
	gulp.watch('app/sass/**/*.+(scss|sass)', ['sass']);
	gulp.watch('app/pug/**/*.pug', ['pug']);
	gulp.watch('app/js/**/*.js', browserSync.reload);
});

gulp.task('default', ['watch']);

gulp.task('clean', function() {
    return del.sync('dist');
});

gulp.task('img', function() {
  return gulp.src('app/img/**/*')
    .pipe(cache(imagemin({
      interlaced: true,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    })))
    .pipe(gulp.dest('dist/img'));
});

gulp.task('build', ['clean', 'img', 'pug', 'sass', 'scripts'], function() {

  var buildCss = gulp.src([
    'app/css/**/*',
    ])
  .pipe(gulp.dest('dist/css'))

  var buildFonts = gulp.src('app/fonts/**/*')
  .pipe(gulp.dest('dist/fonts'))

  var buildJs = gulp.src('app/js/**/*')
  .pipe(gulp.dest('dist/js'))

  var buildHtml = gulp.src('app/*.html')
  .pipe(gulp.dest('dist'));

});

gulp.task('clear', function () {
  return cache.clearAll();
})
