const path = require('path');
const assetPath = 'assets';
const outputPath = 'dist';
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );
//https://webpack.js.org/plugins/mini-css-extract-plugin/#minimizing-for-production

module.exports = {
  context: path.resolve(__dirname, 'src/' + assetPath),
  mode: 'production',
  entry: {
    bundle: '/js' + '/bundle.js',
    main: '/scss' + '/main.scss',
    editor: '/scss' + '/editor.scss',
  },
  devtool: 'source-map',
  plugins: [

    // generates a new index.html
    new HtmlWebpackPlugin({
      filename: '../index.html',
      title: 'Production',
      template: 'index.html'
    }),

    // remove empty .js for css entry points
    new RemoveEmptyScriptsPlugin(),
    // extract and write css
    new MiniCssExtractPlugin({
      filename: 'css/[name].min.css',
    }),
    // wordpress dependencies
    // https://developer.wordpress.org/block-editor/reference-guides/packages/packages-dependency-extraction-webpack-plugin/
    new DependencyExtractionWebpackPlugin( {
      injectPolyfill: true,
      combineAssets: true,
    }),
  ],
  /*
   * output management
   * https://webpack.js.org/guides/output-management/
   */
  output: {
    filename: 'js/[name].js',
    path: path.resolve(__dirname, outputPath + '/' + assetPath),
    clean: true,
    assetModuleFilename: '[path][name][ext]'
  },
  optimization: {
    minimizer: [
      // For webpack@5 you can use the `...` syntax to extend existing minimizers (i.e. `terser-webpack-plugin`), uncomment the next line
      `...`,
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: [
            "default",
            {
              discardComments: { removeAll: true },
            },
          ],
        },
      }),
    ],
  },
  /*
   * module type: https://webpack.js.org/guides/asset-modules/
   * sass https://webpack.js.org/guides/entry-advanced/
   * resolve url loader: https://github.com/bholloway/resolve-url-loader/blob/v4-maintenance/packages/resolve-url-loader/README.md
   */
  module: {
    rules: [
      {
        test: /\.m?js$/,
        include: ['/src/assets/js/'],
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ['@babel/preset-env']
          },
        }
      },
      {
        test: /\.css$/,
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
            options: {
              sourceMap: true,
            },
          },
          {
            // Handles autoprefixer
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            }
          },
          {
            // Dart sass compiler
            loader: 'sass-loader',
            options: {
              implementation: require("sass"),
              sourceMap: true,
            }
          }
        ],
      },
      {
        test: /\.(jpg|jpeg|gif)$/i,
        type: 'asset/resource',
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
