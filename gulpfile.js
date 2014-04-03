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
    includejs       = require('gulp-include'),
    importcss       = require('gulp-cssimport'),
	sass			= require('gulp-ruby-sass');
 
var sources = {
    sass: {
        all: './app/assets/scss/*.scss'
    },
    css: {
    	fancybox: './bower_components/fancybox/source/jquery.fancybox.css'
    },
    javascript: {
    	jquery: './bower_components/jquery/dist/jquery.js',

    	foundation: {
    		main: './bower_components/foundation/js/foundation.js',
    		modernizer: './bower_components/foundation/js/vendor/modernizer.js',
    	},

    	fancybox: {
    		main: './bower_components/fancybox/source/jquery.fancybox.js',
    		media: './bower_components/fancybox/source/helpers/jquery.fancybox-media.js',
    	},

        unveil: './bower_components/unveil/jquery.unveil.js',

        countdown: './bower_components/jquery.countdown/dist/jquery.countdown.js',

    	localVendor: './app/assets/vendor/**/*.js',

    	//directions: './app/assets/js/directions.js',
    	app: './app/assets/js/app.js'
    }
};

var targets = {
    img: 	'./public/img',
    css: 	'./public/css',
    js:  	'./public/js',
};

// JS hint task
gulp.task('jshint', function() {
	gulp.src('./src/js/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
	gulp.src([
            // sources.javascript.jquery,
            // sources.javascript.foundation.main,
            // sources.javascript.fancybox.main,
            // sources.javascript.fancybox.media,
            // sources.javascript.unveil,
            // sources.javascript.countdown,
            sources.javascript.app
        ])
        //.pipe(concat('app.js'))
        .pipe(includejs())
        .pipe(gulp.dest(targets.js))
		.pipe(stripDebug())
		.pipe(uglify('compress'))
		.pipe(rename(function (path) {
	        path.basename += '.min';
	    }))
		.pipe(gulp.dest(targets.js));
});

// compile CSS
gulp.task('sass', function() {

    gulp.src([
            './app/assets/scss/app.scss', 
            './app/assets/scss/app-admin.scss'
        ])
        .pipe(importcss())
        .pipe(sass({
            loadPath: [
                './bower_components/foundation/scss', 
                './bower_components'
            ]
        }))

        .pipe(autoprefix('last 2 versions'))
        .pipe(gulp.dest(targets.css))
        .pipe(minifyCSS())
        .pipe(rename(function (path) {
	        path.basename += '.min';
	    }))
        .pipe(gulp.dest(targets.css));
});

gulp.task('watch', function () {
    gulp.watch('./app/assets/scss/**/*.scss', ['sass']);
    gulp.watch('./app/assets/js/*.js', ['scripts']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);