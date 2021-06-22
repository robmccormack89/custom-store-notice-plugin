// gulp pot
const gulp = require('gulp');
const wpPot = require('gulp-wp-pot');

const config = {
  "text_domain" : "custom-store-notice",
  "php_files"   : "{*.php,!(vendor|page-templates)/**/*.php}", // all php files in all folders incl. root except vendor|page-templates
  "destFolder"  : "languages",
};

gulp.task('pot', () => {
  const output = gulp.src(config.php_files)
    .pipe(wpPot({
      domain: config.text_domain
    }))
    .pipe(gulp.dest(`${config.destFolder}/${config.text_domain}.pot`))
  return output;
});