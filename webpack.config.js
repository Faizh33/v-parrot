// webpack.config.js
const Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .addEntry('app', './public/js/app.js')
  .addStyleEntry('home', './public/css/home.css')
  .enableSassLoader()
  .splitEntryChunks()
  .cleanupOutputBeforeBuild()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .enableSingleRuntimeChunk(); 

module.exports = Encore.getWebpackConfig();