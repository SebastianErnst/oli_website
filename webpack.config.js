const path = require('path'),
    webpack = require('webpack');

module.exports = {
    mode: 'development',
    watch: true,
    recordsPath: path.resolve(__dirname, './records.json'),
    entry: {
        main: './scripts/main.js'
    },
    output: {
        path: path.resolve(__dirname, './build'),
        filename: '[name].js',
        libraryTarget: 'umd',
        publicPath: '/build/'
    },
    optimization: {
        runtimeChunk: 'single',
        splitChunks: {
            cacheGroups: {
                common: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'common',
                    chunks: 'all',
                    enforce: true
                },
                vendors: {
                    name: 'vendor',
                    chunks: 'all',
                    enforce: true
                }
            }
        }
    },
    performance: {},
    resolve: {
        symlinks: false
    },
    module: {
        rules: [
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: 'jQuery'
                    },
                    {
                        loader: 'expose-loader',
                        options: '$'
                    }
                ]
            }
        ]
    }
};
