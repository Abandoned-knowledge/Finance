const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const fileInclude = require("gulp-file-include");
const browserSync = require("browser-sync").create();
const clean = require("gulp-clean");
const fs = require("fs");

gulp.task("clean", function (done) {
  if (fs.existsSync("./public/")) {
    return gulp.src("./public/", { read: false }).pipe(clean());
  }
  done();
});

gulp.task("sass", function () {
  return gulp
    .src("./src/scss/**/*.scss")
    .pipe(sass())
    .pipe(gulp.dest("./public/css"));
});

gulp.task("img", function () {
  return gulp.src("./src/img/**").pipe(gulp.dest("./public/img/"));
});
gulp.task("js", function () {
  return gulp.src("./src/js/**/*.js").pipe(gulp.dest("./public/js/"));
});

gulp.task("html", function () {
  return gulp
    .src("./src/**/*.html")
    .pipe(
      fileInclude({
        prefix: "@@",
        basepath: "@file",
      })
    )
    .pipe(gulp.dest("./public/"));
});

gulp.task("php", function () {
  return gulp
    .src("./src/**/*.php")
    .pipe(
      fileInclude({
        prefix: "@@",
        basepath: "@file",
      })
    )
    .pipe(gulp.dest("./public/"));
});

gulp.task("server", function () {
  browserSync.init({
    // server: {
    //   baseDir: "./public/"
    // }
    proxy: "finance",
  });
});

gulp.task("watch", function () {
  gulp
    .watch("./src/scss/**/*.scss", gulp.parallel("sass"))
    .on("change", browserSync.reload);
  gulp
    .watch("./src/**/*.html", gulp.parallel("html"))
    .on("change", browserSync.reload);
  gulp
    .watch("./src/img/", gulp.parallel("img"))
    .on("change", browserSync.reload);
  gulp
    .watch("./src/js/**/*.js", gulp.parallel("js"))
    .on("change", browserSync.reload);
  gulp
    .watch("./src/**/*.php", gulp.parallel("php"))
    .on("change", browserSync.reload);
});

gulp.task(
  "default",
  gulp.series(
    "clean",
    gulp.parallel("html", "sass", "img", "js", "php"),
    gulp.parallel("watch", "server")
  )
);
