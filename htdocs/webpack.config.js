const Encore = require('@symfony/webpack-encore');
require("dotenv").config();
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableSassLoader()
    .autoProvidejQuery()
    .configureDevServerOptions(options => {
        options.server = {
            type: 'https',
        }
    })
    .addPlugin(new BrowserSyncPlugin(
        {
            host: "localhost",
            port: 32787,
            type: 'http',
            proxy: process.env.PROXY,
            files: [
                {
                    match: ["src/*.php"],
                },
                {
                    match: ["templates/*.twig"],
                },
                {
                    match: ["assets/*.js"],
                },
                {
                    match: ["assets/*.css"],
                },
            ],
            notify: false,
        },

        {

            reload: true,
        }
    ))

;

module.exports = Encore.getWebpackConfig();
