// include gulp
var gulp = require('gulp');

// include plug-ins
var jshint 			= require('gulp-jshint'),
	changed 		= require('gulp-changed'),
	imagemin 		= require('gulp-imagemin'),
	concat 			= require('gulp-concat'),
	stripDebug 		= require('gulp-strip-debug'),
	uglify 			= require('gulp-uglify'),
	autoprefix 		= require('gulp-autoprefixer'),
	minifyCSS 		= require('gulp-minify-css'),
	rename			= require('gulp-rename'),
	less			= require('gulp-less');
 

// JS hint task
// gulp.task('jshint', function() {
// 	gulp.src('./src/js/*.js')
// 		.pipe(jshint())
// 		.pipe(jshint.reporter('default'));
// });

// minify new images
// gulp.task('imagemin', function() {
// 	var imgSrc = './src/img/**/*',
// 		imgDst = './build/img';

// 	gulp.src(imgSrc)
// 		.pipe(changed(imgDst))
// 		.pipe(imagemin())
// 		.pipe(gulp.dest(imgDst));
// });

// JS concat, strip debugging and minify
// gulp.task('scripts', function() {
// 	gulp.src(['./src/js/lib.js','./src/js/*.js'])

// 		.pipe(gulp.dest('./build/js/'));
// 		.pipe(concat('script.js'))
// 		.pipe(stripDebug())
// 		.pipe(uglify())
// 		.pipe(gulp.dest('./build/js/min/'));
// });

// CSS concat, auto-prefix and minify
// gulp.task('styles', function() {
// 	gulp.src(['./src/css/*.css'])
// 		.pipe(concat('styles.css'))
// 		.pipe(autoprefix('last 2 versions'))
// 		.pipe(minifyCSS())
// 		.pipe(gulp.dest('./build/css/'));
// });

// SASS compile
// gulp.task('sass', function() {
// 	gulp.src('./src/scss/*.scss')
// 		.pipe(sass())
// 		.pipe(gulp.dest('./build/css/'))
// });

// default gulp task
//gulp.task('default', ['imagemin','scripts','styles'], function() {
	// Watch for JS changes
	// gulp.watch('./src/js/*.js', function() {
	// 	gulp.run('jshint', 'scripts');
	// });

	// Watch for SCSS changes
	// gulp.watch('./src/css/*.css', function() {
	// 	gulp.run('styles');
	// });
//});




















var sources = {
    less: {
        app: './src/less/app.less'
    },
    javascript: {
    	all: './src/js/*.js'
    }
};

var targets = {
    img: 	'./build/img',
    css: 	'./build/css',
    js:  	'./build/js',
};

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
	gulp.src(sources.javascript.all)
		.pipe(stripDebug())
		//.pipe(gulp.dest(targets.js))
		.pipe(uglify('compress'))
		.pipe(rename(function (path) {
	        path.basename += '.min';
	    }))
		.pipe(gulp.dest(targets.js));
});

// compile LESS
gulp.task('less', function() {
    gulp.src(sources.less.app)
        .pipe(less())
        .pipe(autoprefix('last 2 versions'))
        //.pipe(concat('app.css'))
        //.pipe(gulp.dest(targets.css))
        .pipe(minifyCSS())
        .pipe(rename(function (path) {
	        path.basename += '.min';
	    }))
        .pipe(gulp.dest(targets.css));
});

gulp.task('watch', function () {
    gulp.watch('./src/less/**/*.less', ['less']);
    gulp.watch('./src/js/*.js', ['scripts']);
});

gulp.task('default', ['less', 'scripts', 'watch']);