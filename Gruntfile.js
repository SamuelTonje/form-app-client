module.exports = function(grunt) {
    var conf = {
        webDir      : 'web/assets/',
        scssDir     : 'scss/',
        cssDir      : 'css/',
        jsDir       : 'js/',
        jsTmpDir    : 'js/tmp',
        imgDir      : 'img/',
        fontsDir    : 'fonts/',
        stathamPath : 'web/assets/js/statham.json',
        jsFiles     : []
    };

    var jsMix = grunt.file.readJSON(conf.stathamPath);
    for ( var i = 0; i < jsMix.files.length; i++) {
        conf.jsFiles.push(conf.webDir + jsMix.files[i]);
    }

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: ['**/*.scss'],
                tasks: ['cssroutine'],
                options: {
                    cwd: conf.webDir + conf.scssDir,
                    livereload: true
                }

            },
            js: {
                files: ['**/*.js', '!**.min.js'],
                tasks: ['jsroutine'],
                options: {
                    cwd: conf.webDir + conf.jsDir,
                    livereload: true
                }
            },
            html: {
                files: ['**/*.html.twig'],
                tasks: [],
                options: {
                    livereload: true
                }
            }
        },
        sass: {
            options: {
                sourceMap: true,
                includePaths: ['web/assets/bower_components/foundation/scss'],
                outputStyle: 'compact'
            },
            dist: {
                files: {
                    'web/assets/css/app.css': 'web/assets/scss/app.scss'
                }
            }
        },
        autoprefixer: {
            no_dest: {
              src: conf.webDir + conf.cssDir + 'app.css'
            },
        },
        babel: {
            options: {
                presets: ['es2015']
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: conf.webDir + conf.jsDir,
                    src: ['**/*.js', '!plugins.js', '!vendor/*.js', '!**.min.js'],
                    dest: conf.webDir + conf.jsTmpDir
                }]
            }
        },
        uglify: {
            minify_plugins: {
                options: {
                  sourceMap: true,
                  mangle: true
                },
                files: {
                   'web/assets/js/plugins.min.js' : conf.jsFiles
                }
            },
            minify_website: {
                options: {
                  sourceMap: true,
                  mangle: true
                },
                files: [{
                    expand: true,
                    cwd: conf.webDir + conf.jsTmpDir,
                    src: ['**/*.js', '!plugins.js', '!vendor/*.js', '!**.min.js'],
                    dest: conf.webDir + conf.jsDir,
                    ext: '.min.js'
                }]
            }
        },
        clean: [conf.webDir + conf.jsTmpDir],
        copy: {
          main: {
            expand: true,
            files: [{
              expand: true,
              cwd: conf.webDir + conf.fontsDir,
              src: ['**'],
              dest: conf.webDir + conf.cssDir + 'fonts'
            }]
          }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-newer');
    grunt.loadNpmTasks('grunt-babel');

    // Watch
    grunt.registerTask('cssroutine', ['sass', 'newer:autoprefixer']);
    grunt.registerTask('jsroutine', ['babel', 'uglify', 'clean']);
    grunt.registerTask('copy_fonts', ['copy']);

    // Default
    grunt.registerTask('default', ['cssroutine', 'jsroutine', 'copy_fonts']);
    grunt.registerTask('dev', ['default', 'watch']);
};
