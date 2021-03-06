// :)
var gulp          = require('gulp');
var gulpStylus    = require('gulp-stylus');
var gulpConcat    = require('gulp-concat');
var gulpNunjucks  = require('gulp-nunjucks-render');
var gulpHtmlmin   = require('gulp-htmlmin');
var gulpConnectPHP= require('gulp-connect-php');
var browserSync   = require('browser-sync').create();
var rupture       = require('rupture');
var nib           = require('nib');

var path = './frontend';
var pathStylus = [path + '/stylus/*.styl', '!' + path + '/stylus/_**/*.styl']
var pathHtml = [path + '/templates/*.html', '!' + path + '/templates/_**/*.html'];
var pathHtmlTpl = [path + '/templates/'];

var clear = function(el){ return el.replace('!',''); }
var portPHP = 8888;


gulp.task('stylus', function(){
  return gulp.src(pathStylus)
    .pipe(gulpStylus({
          use: [rupture(), nib()],
          import: ['nib']
    }))
    .pipe(gulpConcat('styles.css'))
    .pipe(gulp.dest('public/static/css'));
});

gulp.task('html', function(){
  gulpNunjucks.nunjucks.configure(pathHtmlTpl, {watch:false});
  return gulp.src(pathHtml)
    .pipe(gulpNunjucks())
    .pipe(gulpHtmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('./app/Views'));
});

gulp.task('default', ['stylus', 'html'], function(){

  gulpConnectPHP.server({base:'./public', port:portPHP}, function (){

    browserSync.init({
      proxy: '127.0.0.1:' + portPHP
    });

  });


  gulp.watch(pathStylus.map(clear), ['stylus'])
    .on('change', browserSync.reload);
  gulp.watch(pathHtml.map(clear), ['html'])
    .on('change', browserSync.reload);
});