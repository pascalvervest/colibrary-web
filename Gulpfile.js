var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
	gulp.src('src/AppBundle/Resources/assets/css/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./web/assets/css/'));
});

gulp.task('default', function() {
	gulp.watch('src/AppBundle/Resources/assets/css/*.scss', ['styles']);
});