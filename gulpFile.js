var gulp = require('gulp'),
    livereload = require('gulp-livereload');

gulp.task('styles', function() {
    gulp.src('css/**/*.css')
        .pipe(livereload());
});

gulp.task('scripts', function() {
    gulp.src('js/**/*.js')
        .pipe(livereload());
});
gulp.task('includes', function() {
    gulp.src('inc/**/*.*')
        .pipe(livereload());
});
gulp.task('main', function() {
    gulp.src('*/*.*')
        .pipe(livereload());
});

gulp.task('watch', function() {
    var server = livereload.listen();
    livereload.listen();
    gulp.watch('css/**/*.css', ['styles', 'main']);
    gulp.watch('js/**/*.js', ['scripts', 'main']);
    gulp.watch('inc/**/*.*', ['includes', 'main']);
});

gulp.task('default', ['scripts', 'styles', 'includes', 'main', 'watch']);