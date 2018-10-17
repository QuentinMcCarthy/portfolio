module.exports = function(grunt){
	require('time-grunt')(grunt);
	require('jit-grunt')(grunt);

	grunt.initConfig({
		sass: {
			src: {
				files: {
					'css/master.css': 'sass/master.scss'
				}
			}
		},
		cssmin: {
			src: {
				files: {
					'css/index.min.css': 'css/index.css'
				}
			}
		},
		watch: {
			sass: {
				files: ['sass/*.scss'],
				tasks: ['sass', 'cssmin']
			}
		}
	});

	// grunt.loadNpmTasks();

	// grunt.registerTask();
	grunt.registerTask('loadcss', ['sass', 'cssmin']);
};
