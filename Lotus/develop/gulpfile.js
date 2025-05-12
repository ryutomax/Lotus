"use strict";

//----------------------------------------------------------------------
//  モジュール読み込み
//----------------------------------------------------------------------
const gulp = require("gulp");
const { src, dest, watch, series, parallel } = require("gulp");

const sassGlob = require("gulp-sass-glob-use-forward");
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
// const purgecss = require("gulp-purgecss");
const cleancss = require("gulp-clean-css");

// const browserSync = require("browser-sync").create();  //変更を即座にブラウザへ反映
const uglify = require("gulp-uglifyes");               //jsファイル圧縮用 ES6でも可

const webpackStream = require("webpack-stream");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config");     // webpackの設定ファイルの読み込み
// webpackの設定をdevelopmentモードで読み込む
const webpackDevConfig = webpackConfig({ production: false });

const plumber = require("gulp-plumber");
const notify = require("gulp-notify");                 //デスクトップ通知
const rename = require('gulp-rename');                 //ファイル出力時にファイル名を変える

// ========================================
// ** path
// ========================================
const srcPath = {
  'scss': './src/scss/**/*.scss',
  'img': './src/images/**/*',
  'js': './src/js/**/*.js',
  'Ejs': '!./src/ejs/include/*.ejs',  //除外指定

};
const distPath = {
  'css': '../assets/css',
  'img': '../assets/images',
  'js': '../assets/js/parts',
  'item': '../',
};

// ========================================
// ** webpack連携
// ========================================
const webpackTask = () => {
  return webpackStream(webpackConfig, webpack)
    .pipe(webpackStream(webpackDevConfig, webpack))
    .pipe(dest("../assets/js/"));
}

// ========================================
// ** js copy
// ========================================
const jsFunc = () => {
  return src('./src/js/parts/*.js')
    .pipe(uglify())
    .pipe(rename({
          extname: '-min.js'
    }))
    .pipe(dest(distPath.js))
}

// ========================================
// ** Sass
// ========================================
const cssSass = () => {
  return src(srcPath.scss)
  .pipe( plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }) )                                  // watch中にエラーが発生してもwatchが止まらないようにする
  .pipe( sassGlob() )                                 // glob機能
  .pipe( sass({
    includePaths: ['./scss/']                         // sassコンパイル
  }))
  .pipe(postcss([
    autoprefixer({}),                                 //package.jsonにブラウザリスト記載
    //mqPacker({ sort: true }),                         //メディアクエリまとめる
  ]))
  // .pipe(purgecss({                                    //未使用のスタイルを削除
  //   content: [srcPath.js, srcPath.Ejs],  //src()のファイルで使用される可能性のあるファイルを全て指定
  //   }))
  .pipe(cleancss())                                   //コード内の不要な改行やインデントを削除
  .pipe(rename({
    extname: '-min.css'
  }))
  .pipe(notify({
    message: 'Sass compile completely!',              //通知コメント
    onLast: true
  }))
  .pipe(dest(distPath.css));
}

// ========================================
// img最適化
// ========================================

const imageMin = require("gulp-imagemin");              // npm i -D gulp-imagemin@7.1.0
const mozjpeg = require("imagemin-mozjpeg");
const pngquant = require("imagemin-pngquant");
const changed = require("gulp-changed");

const imgMin = () => {
  return src(srcPath.img)
  .pipe(changed(distPath.img))
  .pipe(
    imageMin([
      pngquant({
          quality: [0.6, 0.7],
          speed: 1,
      }),
      mozjpeg({ quality: 65 }),
      imageMin.svgo(),
      imageMin.optipng(),
      imageMin.gifsicle({ optimizationLevel: 3 }),
    ])
  )
  .pipe(notify({
    message: 'image minify completely!',
    onLast: true
  }))
  .pipe(dest(distPath.img));
}

// ========================================
// **ローカルサーバー起動
// ========================================
// const buildServer = () => {
//   browserSync.init({
//     server: './dist/',
//     port: 8080,
//     ui: false,
//   });
// }

// /* リロード */
// const browserReload = (done) => {
//   browserSync.reload();
//   done();
// }

// ========================================
// ** buildTask管理(起動時)
// ========================================
const buildTask = series(cssSass, jsFunc, webpackTask, imgMin);

// ========================================
// ** watch管理(変更時)
// ========================================
const watchTask = () => {
  watch(srcPath.img, parallel(imgMin));
  watch(srcPath.scss, series(cssSass));
  watch(srcPath.js, parallel(jsFunc));
  watch(srcPath.js, series(webpackTask));

}

// =========================
// ** parallel：並列処理
// =========================
//exports.w = parallel(watchTask);
exports.def = parallel(buildTask, watchTask);