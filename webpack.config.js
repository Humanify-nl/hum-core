const path = require('path');
const assetPath = 'assets';
const outputPath = 'dist';
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  context: path.resolve(__dirname, 'src/' + assetPath),
  mode: 'development',
  entry: {
     bundle: '/js' + '/bundle.js',
     main: '/scss' + '/main.scss',
     editor: '/scss' + '/editor.scss',
     layout: '/scss' + '/editor-layout.scss',
     admin: '/scss' + '/admin.scss',
   },
  plugins: [
    // generates a new index.html
    new HtmlWebpackPlugin({
      filename: '../index.html',
      title: 'Development',
      template: 'index.html'
    }),
    // remove empty .js for css entry points
    new RemoveEmptyScriptsPlugin(),
    // extract and write css
    new MiniCssExtractPlugin({
      filename: 'css/[name].css'
    }),
    // copy files excempt from build process
    new CopyPlugin({
      patterns: [
        // assets
        {
          from: 'icons/*.svg',
        },
        // template files
        {
          from: path.resolve(__dirname, 'src/'),
          to: path.resolve(__dirname, 'dist/'),
          globOptions: {
           ignore: [
             // Ignore all files in assets dir
             '**/assets/**',
           ],
         },
        },
      ],
    }),
  ],
  /*
   * https://webpack.js.org/guides/output-management/
   */
  output: {
    filename: 'js/[name].js',
    path: path.resolve(__dirname, outputPath + '/' + assetPath),
    clean: true,
    assetModuleFilename: '[path][name][ext]'
  },
  /*
   * https://webpack.js.org/guides/code-splitting/
   *
  optimization: {
    splitChunks: {
      chunks: 'all',
    },
  },
  */
  /*
   * module type: https://webpack.js.org/guides/asset-modules/
   * sass https://webpack.js.org/guides/entry-advanced/
   * resolve url loader: https://github.com/bholloway/resolve-url-loader/blob/v4-maintenance/packages/resolve-url-loader/README.md
   */
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          //'style-loader'
          {
            // Extract css
            loader: MiniCssExtractPlugin.loader,
          },
          {
            // Translates CSS into CommonJS
            loader: 'css-loader',
          },
          {
            // Handles autoprefixer
            loader: 'postcss-loader',
          },
          {
            // Dart sass compiler
            loader: 'sass-loader',
            options: {
              implementation: require("sass"),
            }
          }
        ],
      },
      {
        test: /\.(jpg|jpeg|gif)$/i,
        type: 'asset/resource',
        generator: {
          //filename: 'assets/images/[name][ext]'
        }
      },
      {
        test: /\.(png|svg)$/i,
        type: 'asset/resource',
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf)$/i,
        type: 'asset/resource',
      },
    ],
  },
  externals: {
    jquery: 'jQuery'
  }
};
