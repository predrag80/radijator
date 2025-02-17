const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
  devtool: 'source-map',
  entry: {
    bundle: './assets/js/main.js',
  },
  output: {
    filename: 'js/[name].js', // Non-minified JS
    path: path.resolve(__dirname, './assets/dist'),
    clean: true,
  },
  optimization: {
    minimize: true, // Enable default minification in production mode
    minimizer: [
      '...', // Use Webpack's default JavaScript minification
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: [
            'default',
            {
              discardComments: { removeAll: true }, // Remove all comments
            },
          ],
        },
      }),
    ],
  },
  externalsPresets: { node: true },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].css', // Non-minified CSS
    }),
    new MiniCssExtractPlugin({
      filename: 'css/[name].min.css', // Minified CSS
    }),
  ],
  module: {
    rules: [
      {
        test: /\.(?:js)$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: [['@babel/preset-env', { targets: 'defaults' }]],
          },
        },
      },
      {
        test: /.s?css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        type: 'asset/resource',
        generator: {
          filename: 'img/[name][ext]',
        },
      },
    ],
  },
};
