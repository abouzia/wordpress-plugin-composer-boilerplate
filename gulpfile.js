const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
// const browserSync = require("browser-sync").create();

function style() {
  let plugins = [cssnano()];

  return gulp
    .src("./src/scss/*.scss")
    .pipe(sass())
    .pipe(postcss(plugins))
    .pipe(gulp.dest("./assets"));
}

function watch() {
  gulp.watch("./src/scss/**/*.scss", style);
}

exports.style = style;
exports.watch = watch;