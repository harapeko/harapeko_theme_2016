g = require 'gulp'
$ = do require 'gulp-load-plugins'
BrowserSync = require('browser-sync').create()

# paths
paths =
  js:
    coffee: 'js/coffee/*.coffee'
    plugin: 'js/plugin/*.js'
    out: 'js/'
  css:
    in: 'css/sass/app.sass'
    out: 'css/'
    watch: ['css/sass/*.sass', 'css/sass/**/*.sass']
  guide:
    config: 'css/sass/styleguide_config.md'
    filename: 'index.html'
    in: 'css/sass/*.sass'
    out: '../../../guide/'


# coffee compile process
# string in_path         入力ディレクトリ
# string out_path        出力ディレクトリ
# string dest_file_name  出力ファイル名
coffee_compile_process = (in_path, out_path, dest_file_name = 'app.js') ->
  g.src([in_path, paths.js.plugin])
  .pipe $.plumber()
  .pipe $.if(/[.]coffee$/, $.coffee())
  .pipe $.uglify mangle: ['jQuery']
  .pipe $.concat dest_file_name
  .pipe g.dest out_path
  .pipe $.filesize()

# coffee
g.task 'coffee', ->
  coffee_compile_process(paths.js.coffee, paths.js.out)


# sass compile process
# string in_path         入力ディレクトリ
# string out_path        出力ディレクトリ
# string dest_file_name  出力ファイル名
sass_compile_process = (in_path, out_path, dest_file_name = 'app.css') ->
  g.src in_path
  .pipe $.plumber()
  .pipe $.sass
    outputStyle: 'extend'
  .pipe $.autoprefixer autoprefixer: '> 5%'
  .pipe $.concat dest_file_name
  .pipe g.dest out_path
  .pipe $.filesize()

# css
g.task 'css', ->
  sass_compile_process(paths.css.in, paths.css.out)


# styledown task
g.task 'guide', ->
  g.src paths.guide.in
  .pipe $.styledown
    config: paths.guide.config
    filename: paths.guide.filename
  .pipe g.dest paths.guide.out


# BrowserSync
g.task 'bs', ->
  BrowserSync.init
    # proxy: 'localhost:8081'
    files: '*',
    port: 8082
    # reloadDelay: 1000


# test task
g.task 'test', ->
  console.log 'this is testtttttttt'


# watch
g.task 'watch' , ->
  # coffee
  g.watch paths.js.coffee, ['coffee']
  # g.watch paths.css.watch, ['css', 'guide', BrowserSync.reload]
  g.watch paths.css.watch, ['css', BrowserSync.reload]
  # g.watch paths.css.watch, ['css']


# default
g.task 'default', ['bs', 'watch']