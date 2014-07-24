module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    uglify: {
      options: {
	   sourceMap: 'js/greensched.min.js.map',
        sourceMappingURL: '/app/plugins/greenrecs-schedule/js/greensched.min.js.map'
      },
      dist: {
        files: {
		'js/greenrecs.min.js' : [
			'js/Schedule-Runner.js',
                  'js/grajax.js'
		]	
		}
      }
    },
    less: {
      dist: {
        options: {
          compress: true,
          cleancss: true,
          report: 'min'
        },
        files: {
          'css/greensched.min.css': [
            'less/*.less'
          ]
        }
      }
    },
    watch: {
      less: {
        files: [
          'less/*.less'
        ],
        tasks: ['less:dist']
      },
      js: {
        files: [
          'js/*.js',
          'vendors/js/*.js'
        ],
        tasks: ['uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: 2525,
        },
        files: [
          
        ]
      }
    },
    clean: {
      dist: [
        'css/greensched.min.css',
        'js/greensched.min.js'
      ]
    },
  });


  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  // Default task(s).
    grunt.registerTask('default', [
    'clean:dist',
    'less:dist',
    'uglify:dist',
  ]);
    grunt.registerTask('dev', [
    'watch'
  ]);

};
