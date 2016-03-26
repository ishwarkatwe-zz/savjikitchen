'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
gulp.task('sass', function () {
  gulp.src('./public/assets_landing/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./public/assets_landing/css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./public/assets_landing/sass/**/*.scss', ['sass']);
});