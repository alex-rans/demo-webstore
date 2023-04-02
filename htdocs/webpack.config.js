const Encore = require('@symfony/webpack-encore');
require("dotenv").config();
// const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}
Encore
    .setOutputPath('public/build/')
    .copyFiles({
        from: './assets/img',
        to: 'img/[path][name].[ext]'
    })
    .setPublicPath('/build')
    .addEntry('main', './assets/js/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .autoProvidejQuery()
    .enableSassLoader()
    .enableSourceMaps(!Encore.isProduction());

module.exports = Encore.getWebpackConfig();