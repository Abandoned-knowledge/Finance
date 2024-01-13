const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const fileInclude = require("gulp-file-include");
const clean = require("gulp-clean");
const livereloaded = require("gulp-server-livereload");
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
  return gulp
    .src("./src/img/**")
    .pipe(gulp.dest("./public/img/"));
});
gulp.task("js", function () {
  return gulp
    .src("./src/js/**/*.js")
    .pipe(gulp.dest("./public/js/"));
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

gulp.task("server", function () {
  return gulp.src("./public/").pipe(
    livereloaded({
      livereload: true,
      open: true,
    })
  );
});

gulp.task("watch", function () {
  gulp.watch("./src/scss/**/*.scss", gulp.parallel("sass"));
  gulp.watch("./src/**/*.html", gulp.parallel("html"));
  gulp.watch("./src/img/", gulp.parallel("img"));
  gulp.watch("./src/js/**/*.js", gulp.parallel("js"));
});

gulp.task(
  "default",
  gulp.series(
    "clean",
    gulp.parallel("html", "sass", "img", "js"),
    gulp.parallel("watch", "server")
  )
);
