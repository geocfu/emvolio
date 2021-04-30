const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
  .vue()
  .postCss('resources/css/app.css', 'public/css', [
    require("tailwindcss"),
    // require('autoprefixer'),
  ])
  .webpackConfig({
    output: {
      chunkFilename: 'js/[name].js?id=[chunkhash]',
    }
  });

if (mix.inProduction()) {
  mix.version();
} else {
  const hmrPort = Number(process.env.MIX_HMR_PORT)

  mix.options({
    // https://github.com/JeffreyWay/laravel-mix/blob/c67ff394bfffead9a1e2bc71ac97559e394e4cfe/src/config.js#L24
    hmrOptions: {
      host: 'localhost',
      port: hmrPort,
    }
  })
}
