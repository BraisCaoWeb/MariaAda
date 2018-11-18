const path = require("path");
const settings = require("./settings");

module.exports = {
    entry: [
        "babel-polyfill",
        settings.themeLocation + "js/index.js",
        settings.themeLocation + "sass/main.scss"
    ],
    output: {
        path: path.resolve(__dirname, settings.themeLocation + "js"),
        filename: "bundled.js"
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
                            name: "mariaada.css",
                            outputPath: "../css/"
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
    }
};
