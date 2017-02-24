var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var source = require('vinyl-source-stream');

// javascript
var concat = require('gulp-concat');  
var rename = require('gulp-rename');  
var uglify = require('gulp-uglify'); 

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

var jsFiles = './public/js/aris/**/*.js',  
    jsDest = './public/js';

gulp.task('scripts', function() {  
    return gulp.src(jsFiles)
        .pipe(concat('aris.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('aris.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});