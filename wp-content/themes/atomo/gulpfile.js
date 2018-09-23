/* ===================================================== *
 * Átomo · Gulp Pipelines                                *
 * ===================================================== *
 *                                                       *
 * Streamlined scripts to generate production ready      *
 * frontend artefacts from our source assets.            *
 *                                                       *
 * For obvious reasons the processes are tweaked in      *
 * various ways to satisfy the specific requirements     *
 * inherent to WordPress themes.                         *
 *                                                       *
 *                                                       *
 * NOTE This will replace older LESS/CSS files.          *
 *                                                       *
 * ===================================================== */

const path = require('path');

const gulp = require('gulp');
const sass = require('gulp-sass');
const watch = require('gulp-watch');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const cleancss = require('gulp-clean-css');
const sizewise = require('gulp-size');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');

const node_modules = path.resolve(__dirname, 'node_modules');
const bootstrap = path.resolve(__dirname, 'bootstrap');
const assets = path.resolve(__dirname, 'assets');
const pkg = path.resolve(__dirname, 'package.json')

const fileheader = require('wp-file-header')(pkg);

const includes = [
  path.resolve(__dirname, 'assets'),
  path.resolve(__dirname, 'node_modules'),
];

const dependencies = [
  path.resolve(node_modules, 'jquery/dist/jquery.js'),
  path.resolve(node_modules, 'popper.js/dist/umd/popper.js'),
  path.resolve(node_modules, 'bootstrap/dist/js/bootstrap.js'),
];


gulp.task('default', ['build', 'watch']);
gulp.task('build', ['styles', 'js']);
gulp.task('watch', ['watch:styles', 'watch:js']);


/*  ~: styles :~  */

gulp.task('styles', ['build:styles', 'patch:styles']);

gulp.task('build:styles', function () {
  return gulp.src(['assets/styles/[!_]*.scss'])
             .pipe(sass({ includePaths: includes })
                  .once('error', function () { process.exit(1) })
                  .once('end', function () { process.exit(0) }))
             .pipe(sourcemaps.init())
             .pipe(sizewise())
             .pipe(autoprefixer({ browsers: 'last 2 versions' }))
             .pipe(concat('style.css'))
             .pipe(cleancss())
             .pipe(sourcemaps.write('dist/maps'))
             .pipe(gulp.dest('.'));
});

gulp.task('patch:styles', ['build:styles'], function () {
  fileheader.patch('style.css', function (err) {
    console.error('Failed to patch theme metadata into "style.css" file.');
    process.exit(1)
  });
});


/*  ~: js :~  */

gulp.task('js', ['js:vendor', 'js:bundle']);

gulp.task('js:vendor', function () {
  return gulp.src(dependencies)
             .pipe(sourcemaps.init())
             .pipe(concat('vendor.js'))
             .pipe(sizewise())
             .pipe(uglify())
             .pipe(sourcemaps.write('../maps'))
             .pipe(gulp.dest('dist/js'));
});

gulp.task('js:bundle', function () {
  return gulp.src(['assets/js/*.js'])
             .pipe(sourcemaps.init())
             .pipe(concat('bundle.js'))
             .pipe(sizewise())
             .pipe(uglify())
             .pipe(sourcemaps.write('../maps'))
             .pipe(gulp.dest('dist/js'));
});


/*  ~: watch :~  */

gulp.task('watch:styles', function () {
  gulp.watch(['assets/styles/**/*.scss'], ['styles']);
})

gulp.task('watch:js', function () {
  gulp.watch(['assets/js/**/*.js'], ['js']);
});
