var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    bulkSass = require('gulp-sass-bulk-import'),
    cssmin = require('gulp-cssmin'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    frontnote = require('gulp-frontnote'),
    tinyping = require('gulp-tinypng-compress'),
    spritesmith = require('gulp.spritesmith'),
    svgstore = require('gulp-svgstore'),
    cheerio = require('gulp-cheerio'),
    svgmin = require('gulp-svgmin'),
    path = require('path'),
    plumber = require('gulp-plumber'),
    browser = require('browser-sync');

var SRC = 'src';

//style
gulp.task('sass', function() {
    gulp.src(SRC + '/sass/**/*.scss')
    .pipe(plumber())
    .pipe(frontnote({
        css: 'site/css/common.css'
    }))
    .pipe(sourcemaps.init())
    .pipe(bulkSass())
    .pipe(sass({outputStyle: 'expanded'})) //nested,compact,expanded,compressed
    .pipe(autoprefixer({
        // ☆IEは9以上、Androidは4以上、iOS Safariは8以上
        // その他は最新2バージョンで必要なベンダープレフィックスを付与する設定
        browsers: ['last 2 versions', 'ie >= 9', 'Android >= 4','ios_saf >= 8'],
        cascade: false
    }))
    .pipe(sourcemaps.write('../maps/'))
    .pipe(gulp.dest('guide/site/css'))
    .pipe(gulp.dest('site/css'))
    .pipe(browser.reload({stream:true}));
});

//browser sync
gulp.task('server', function() {
    browser({
        proxy: "http://wp-template.test"
    });
});

gulp.task('bs-reload', function () {
    browser.reload();
});

//CSSmin
gulp.task('cssmin', function () {
    gulp.src(SRC + '/css/**/*.css')
    .pipe(cssmin())
    .pipe(plumber())
    .pipe(gulp.dest('guide/site/css/min'))
    .pipe(gulp.dest('assets/css/min'));
});

//JSmin
gulp.task('js', function() {
    gulp.src(SRC + '/js/assets/**/*.js')
    .pipe(plumber())
    .pipe(uglify())
    //.pipe(gulp.dest('./guide/site/js/min'))
    .pipe(gulp.dest('assets/js/min'));

    gulp.src(SRC + '/js/site/**/*.js')
    .pipe(plumber())
    .pipe(uglify())
    //.pipe(gulp.dest('./guide/site/js/min'))
    .pipe(gulp.dest('site/js'));
});

//sprite-pc
gulp.task('sprite', function () {
    var spriteData = gulp.src(SRC + '/sprite/*.png')
    .pipe(plumber())
    .pipe(spritesmith({
        imgName: 'sprite.png',
        cssName: '_sprite.scss',
        padding: 20,
        imgPath: '/wp-content/themes/wp-template/assets/images/sprite.png',
        cssFormat: 'scss',
        algorithm:'top-down',
        cssOpts: {
            functions: false
        },
        cssVarMap: function (sprite) {
            sprite.name = 'sprite-' + sprite.name;
        }
    }));
    spriteData.img.pipe(gulp.dest(SRC + '/img/assets/'));
    spriteData.css.pipe(gulp.dest(SRC + '/sass/core/'));
});

//sprite_sp
gulp.task('sprite_sp', function () {
    var spriteData = gulp.src(SRC + '/sprite_sp/*.png')
    .pipe(plumber())
    .pipe(spritesmith({
        imgName: 'sprite_sp.png',
        cssName: '_sprite_sp.scss',
        padding: 20,
        imgPath: '/wp-content/themes/wp-template/assets/images/sprite_sp.png',
        cssFormat: 'scss',
        algorithm:'top-down',
        cssOpts: {
            functions: false
        },
        cssVarMap: function (sprite) {
            sprite.name = 'sprite-' + sprite.name;
        }
    }));
    spriteData.img.pipe(gulp.dest(SRC + '/img/assets/'));
    spriteData.css.pipe(gulp.dest(SRC + '/sass/core/'));
});

//img_min
gulp.task('tinypng', function () {
    gulp.src(SRC + '/img/assets/**/*.{png,jpg,jpeg}')
    .pipe(tinyping({
        key: 'llZEaFTtjee2TrIOmoBP25AkPKY5BhCW'
    }))
    .pipe(gulp.dest('guide/assets/images/'))
    .pipe(gulp.dest('assets/images/'));

    gulp.src(SRC + '/img/content/**/*.{png,jpg,jpeg}')
    .pipe(tinyping({
        key: 'llZEaFTtjee2TrIOmoBP25AkPKY5BhCW'
    }))
    .pipe(gulp.dest('guide/assets/images/'))
    .pipe(gulp.dest('content/images/'));
});

// svg
gulp.task('svgstore', function () {
  return gulp
  .src(SRC + '/svg/**/*.svg')
  .pipe(plumber())
  .pipe(svgmin(function (file) {
      var prefix = path.basename(file.relative, path.extname(file.relative));
      return {
          plugins: [{
              cleanupIDs: {
                  prefix: prefix + '-',
                  minify: true
              }
          }]
      }
  }))
  .pipe(svgstore({ inlineSvg: true }))

  .pipe(cheerio({
      run: function ($) {
          $('[fill]').removeAttr('fill');
          $('[stroke]').removeAttr('stroke');
          $('svg').attr('style','display:none');
      },
      parserOptions: { xmlMode: true }
  }))
  .pipe(gulp.dest('assets/svg/'));
});

//watch
gulp.task('default',['server'], function() {
    gulp.watch(SRC + '/sass/**/*.scss',['sass']);
    gulp.watch(SRC + '/css/**/*.css',['cssmin']);
    gulp.watch(SRC + '/js/**/*.js',['js']);
    gulp.watch(SRC + '/sprite/**/*.png',['sprite']);
    gulp.watch(SRC + '/sprite_sp/**/*.png',['sprite_sp']);
    gulp.watch(SRC + '/svg/**/*.svg',['svgstore']);
    gulp.watch(SRC + '/img/**/*.{png,jpg,jpeg}',['tinypng']);
    gulp.watch("**/*.php", ['bs-reload']);
});
