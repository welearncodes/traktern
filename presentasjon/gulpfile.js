var gulp = require('gulp'),
    shell = require('gulp-shell'),
    del = require('del');
var browserSync = require('browser-sync').create();

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost/Presentasjon1"
    });
});

function errorLog (error) {
  console.error.bind(error);
  this.emit('end');
}

// Not all tasks need to use streams
// A gulpfile is just another node program and you can use any package available on npm
gulp.task('clean', function() {
  // You can use multiple globbing patterns as you would with `gulp.src`
  return del(['build']);
});

gulp.task('copy', function() {
  return gulp.src('1.presentasjon/*.*')
  .pipe(shell(['copy.bat']));
});

gulp.task('watch', function () {
  gulp.watch(['1.presentasjon/*.*','1.presentasjon/impress-html/*.*'], ['copy']);
});

gulp.task('default', ['copy', 'watch','browser-sync']);