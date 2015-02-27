module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),
    
    //compile the sass

    sass: {
      dist: { 
        files: {
          'css/master.css' : 'scss/master.scss'
        },                  // Target
        options: {              // Target options
          style: 'compressed',
          loadPath: ['scss', 'bower_components/foundation/scss/', '../division-bar/scss/']
        }
      }
    },

    //concat all the files into the build folder

    concat: {
      js:{
        src: ['bower_components/jquery/jquery.js',
          'bower_components/jquery.equalheights/jquery.equalheights.js',
          'bower_components/fitvids/jquery.fitvids.js',
          'bower_components/flexslider/jquery.flexslider.js',
          'bower_components/blazy/blazy.js',
	        'bower_components/REM-unit-polyfill/js/rem.js',
          'node_modules/fg-loadcss/loadCSS.js',
          '../division-bar/js/division-bar.js',
          'js/*.js',
          'vendor/visible/jquery.visible.js'],
        dest: 'build/build.src.js'
      }
    },

    //minify those concated files
    //toggle mangle to leave variable names intact

    uglify: {
      options: {
        mangle: true
      },
      my_target:{
        files:{
        'build/build.js': ['build/build.src.js'],
        }
      }
    },
    watch: {
      scripts: {
        files: ['js/*.js', 'js/**/*.js'],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: true,
        }
      },
      css: {
        files: ['scss/*.scss', 'scss/**/*.scss', 'scss/*.scss','scss/**/*.scss'],
        tasks: ['sass'],
        options: {
          spawn: true,
        }
      }
    }


  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-simple-watch');

  // Default task(s).
  // Note: order of tasks is very important
  grunt.registerTask('default', ['sass', 'concat', 'uglify', 'watch']);

};
