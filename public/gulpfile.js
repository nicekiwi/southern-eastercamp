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
	sass			= require('gulp-sass');
 
var sources = {
    sass: {
        app: './src/scss/app.scss'
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

// JS hint task
gulp.task('jshint', function() {
	gulp.src('./src/js/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

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
gulp.task('sass', function() {
    gulp.src(sources.sass.app)
        .pipe(sass())
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
    gulp.watch('./src/scss/**/*.scss', ['sass']);
    gulp.watch('./src/js/*.js', ['scripts']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);