'use strict';

// for dev: "npm start" 
// for production: "npm run-script build"

import plugins  from 'gulp-load-plugins';
import yargs    from 'yargs';
import browser  from 'browser-sync';
import gulp     from 'gulp';
import del      from 'del';
import yaml     from 'js-yaml';
import fs       from 'fs';

// Load all Gulp plugins into one variable
const $ = plugins();

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Load settings from settings.yml
const { COMPATIBILITY, PORT, UNCSS_OPTIONS, PATHS } = loadConfig();

function loadConfig() {
  let ymlFile = fs.readFileSync('../../../mysite/gulp.yml', 'utf8');
  return yaml.load(ymlFile);
}

gulp.task('build',
 gulp.series(copy, gulp.parallel(sass, javascript, images)));


// Build the site, run the server, and watch for file changes
gulp.task('default',
  gulp.series('build', server, watch));


// Copy files out of the assets folder
// This task skips over the "img", "js", and "scss" folders, which are parsed separately
function copy(done) {
  return gulp.src(PATHS.assets)
    .pipe(gulp.dest(PATHS.theme + '/' + PATHS.dist), done);
}

// Compile Sass into CSS
// In production, the CSS is compressed
function sass() {
  return gulp.src(PATHS.theme + '/src/scss/*.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    // Comment in the pipe below to run UnCSS in production
    //.pipe($.if(PRODUCTION, $.uncss(UNCSS_OPTIONS)))
    .pipe($.cssnano())
    .pipe($.sourcemaps.write('../maps'))
    .pipe(gulp.dest(PATHS.theme + '/' + PATHS.dist + '/css'))
    .pipe(browser.reload({ stream: true }));
}

// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
  //Add theme's app.js to the list of js we're compiling
  PATHS.javascript.push(PATHS.theme + '/src/scripts/app.js');
  return gulp.src(PATHS.javascript)
    .pipe($.sourcemaps.init())
    .pipe($.babel({ignore: ['what-input.js', 'lazyload.js']}))
    .pipe($.concat('app.js'))
    .pipe($.uglify()
      .on('error', e => { console.log(e); })
    )
    .pipe($.sourcemaps.write('../maps'))
    .pipe(gulp.dest(PATHS.theme + '/' + PATHS.dist + '/scripts'));
}

// Copy images to the "themes" folder
// In production, the images are compressed
function images() {
  return gulp.src(['src/images/**/*',PATHS.theme + '/src/images/**/*' ])
    .pipe($.imagemin({
      progressive: true
    }))
    .pipe(gulp.dest(PATHS.theme + '/' + PATHS.dist + '/images'));
}

// Start a server with BrowserSync to preview the site in
function server(done) {
  browser.init({
    proxy: {
      target: "localhost:8888/"+PATHS.projectName
    },
    host:      'site1.domain.dev',
    port:      3060
  });
  done();
}

// Reload the browser with BrowserSync
function reload(done) {
  browser.reload();
  done();
}

// Watch for changes to static assets, pages, Sass, and JavaScript
function watch() {
  gulp.watch(PATHS.assets, copy);

  gulp.watch(PATHS.theme + '/templates/**/*.ss').on('all', browser.reload);
  gulp.watch(PATHS.theme + '/src/scss/**/*.scss').on('all', sass);
  gulp.watch(PATHS.theme + '/src/scripts/**/*.js').on('all', gulp.series(javascript, browser.reload));
  gulp.watch(PATHS.theme + '/src/images/**/*').on('all', gulp.series(images, browser.reload));


  gulp.watch('../division-elearning-project/scss/**/*.scss').on('all', sass);
  gulp.watch('templates/**/*.ss').on('all', browser.reload);
  gulp.watch('src/scss/**/*.scss').on('all', sass);
  gulp.watch('src/scripts/**/*.js').on('all', gulp.series(javascript, browser.reload));
  gulp.watch('src/images/**/*').on('all', gulp.series(images, browser.reload));
}
