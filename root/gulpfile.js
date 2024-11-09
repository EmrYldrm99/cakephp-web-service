const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass')); // sass-Compiler
const cleanCSS = require('gulp-clean-css'); // CSS minifizieren
const rename = require('gulp-rename'); // Zum Umbenennen der minifizierten Dateien
const terser = require('gulp-terser'); // JS Minifizieren

// SCSS zu CSS kompilieren
gulp.task('sass', function() {
  return gulp.src('app/src/scss/**/*.scss')  // SCSS-Dateien im Verzeichnis 'src/scss'
    .pipe(sass().on('error', sass.logError)) // Kompiliere SCSS und logge Fehler
    .pipe(cleanCSS()) // Minifiziere CSS
    .pipe(rename({ suffix: '.min' })) // Fügt '.min' zum Dateinamen hinzu
    .pipe(gulp.dest('webroot/css')); // Speichert die Datei in 'webroot/css'
});

// JavaScript minifizieren
gulp.task('scripts', function() {
  return gulp.src('app/src/js/**/*.js') // Alle JS-Dateien im Verzeichnis 'src/js'
    .pipe(terser()) // Minifiziere die JS-Dateien
    .pipe(rename({ suffix: '.min' })) // Fügt '.min' zum Dateinamen hinzu
    .pipe(gulp.dest('webroot/js')); // Speichert die minifizierte JS-Datei in 'webroot/js'
});

// Watcher für SCSS- und JS-Dateien
gulp.task('watch', function() {
  gulp.watch('app/src/scss/**/*.scss', gulp.series('sass')); // Überwacht SCSS-Dateien
  gulp.watch('app/src/js/**/*.js', gulp.series('scripts')); // Überwacht JS-Dateien
});

// Standard Gulp Task
gulp.task('default', gulp.series('sass', 'scripts', 'watch')); // Führt 'sass', 'scripts' und 'watch' aus


