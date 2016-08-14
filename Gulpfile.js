'use strict';

var browserify = require('browserify');
var buffer = require('gulp-buffer');
var concat = require('gulp-concat');
var gulp = require('gulp');
var gutil = require('gulp-util');
var merge = require('merge-stream');
var plumber = require('gulp-plumber');
var prettify = require('pretty-hrtime');
var sass = require('gulp-sass');
var source = require('vinyl-source-stream');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var path = require('path');

var JS_LIBS = [
	'./web/assets/vendor/jquery/dist/jquery.js'
];

var JS_APP = [
	'./app/Resources/assets/js/common.js',
	'./src/CoLibraryBundle/Resources/assets/js/collection.js',
];

function bundle(b, file) {
	gutil.log('Bundling', gutil.colors.cyan(file));
	var start = process.hrtime();

	return b.bundle()
		.on('error', function(err) {
			gutil.log(gutil.colors.red('Browserify Error'), err.message, 'in', err.filename);
		})
		.pipe(source(path.basename(file)))
		.pipe(buffer())
		.pipe(sourcemaps.init({loadMaps: true}))
		.pipe(uglify({mangle: false, preserveComments: 'some'}))
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest('./web/js'))
		.on('end', function() {
			gutil.log('Finished', gutil.colors.cyan(file), 'after', gutil.colors.magenta(prettify(process.hrtime(start))));
		});
}

gulp.task('libs', function() {
	return gulp.src(JS_LIBS)
		.pipe(plumber())
		.pipe(sourcemaps.init({loadMpas: true}))
		.pipe(concat('libs.js'))
		.pipe(uglify({mangle: false, preserveComments: 'some'}))
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest('web/js'));
});

gulp.task('styles', function() {
	gulp.src('src/AppBundle/Resources/assets/css/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./web/assets/css/'));
});

gulp.task('default', [
	'libs', 'js'
]);

// gulp.task('default', function() {
// 	// gulp.watch('src/AppBundle/Resources/assets/css/*.scss', ['styles']);
// });

gulp.task('js', function() {
	return merge(JS_APP.map(function (file) {
		return bundle(browserify(file, {debug: true}), file);
	}));
});