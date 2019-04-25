var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');
var sftp = require('gulp-sftp-up4');
var plumber = require('gulp-plumber');

// Sassをコンパイルするタスクの設定
gulp.task("css", function () {
    return gulp.src('node_modules/bootstrap/scss/*.scss')// コンパイル対象のSassファイル
            .pipe(sass()) // コンパイル実行
            .pipe(autoprefixer()) // ベンダープレフィックスの付与
            .pipe(gulp.dest('node_modules/bootstrap/dist/css','src/bootstrap/css')); // 出力
});

// .min.cssを生成するタスクの設定
gulp.task("mincss", function () {
    return gulp.src('node_modules/bootstrap/dist/css/bootstrap.css')//上のタスクで出力したcssファイル
            .pipe(cleanCSS()) // cssを圧縮
            .pipe(rename({extname:'.min.css'})) // 名前を.min.cssにする
            .pipe(gulp.dest('node_modules/bootstrap/dist/css','src/bootstrap/css')) // 出力
            .pipe(notify({
                title: 'bootstrap.cssとbootstrap.min.cssをコンパイルしました。',
                message: new Date(),
                sound: 'Pop',
                icon: 'icon.png'
            }));
});

gulp.task("default", function () {
    // scssフォルダを監視し、変更があったらコンパイルする
    gulp.watch('node_modules/bootstrap/scss/*.scss',gulp.series('css', 'mincss'));
});

gulp.task("upload",function () {
    return gulp.src(['index.html','src/bootstrap/css/bootstrap.min.css','src/bootstrap/css/custom-michinosuke.css'],{base:'./'})
        //.pipe(plumber())
        .pipe(sftp({
            host:'sqroller.sakura.ne.jp',
            //port: 21,
            user:'sqroller',
            pass:'hpz8n5u364',
            remotePath:'/home/sqroller/www/maezawa/',
            //timeout:100000
        }));
});