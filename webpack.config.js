const path = require("path");
const settings = require("./settings");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
    entry: [
        "babel-polyfill",
        settings.themeLocation + "js/main.js",
        settings.themeLocation + "sass/main.scss"
    ],
    output: {
        path: path.resolve(__dirname, settings.themeLocation + "js"),
        filename: "main.min.js"
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: "babel-loader"
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "style.css",
                            outputPath: "../"
                        }
                    },
                    {
                        loader: "extract-loader"
                    },
                    {
                        loader: "css-loader"
                    },
                    {
                        loader: "sass-loader"
                    }
                ]
            }
        ]
    },
    plugins: [
        new BrowserSyncPlugin({
            proxy: settings.urlToPreview,
            files: ["**/*.php", "**/*.css", "**/*.js"],
            reloadDelay: 0
        })
    ]
};
