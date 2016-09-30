var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var source = require('vinyl-source-stream');

gulp.task('styles',function(){
    gulp.src('./app/resources/scss/aris_home.scss')
    .pipe(sourcemaps.init())
//    .pipe(rename('testinggulp.scss'))
    .pipe(sass({
        outputStyle: 'compressed'
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./public/css/'));

    gulp.src('./app/resources/scss/aris_admin.scss')
    .pipe(sourcemaps.init())
//    .pipe(rename('testinggulp.scss'))
    .pipe(sass({
        outputStyle: 'compressed'
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./public/css/'));
});