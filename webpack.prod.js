const path = require('path');
const sourcePath = path.join(__dirname, '/src');
const outputPath = path.join(__dirname, '/dist');
const assetPath = 'assets';
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const CopyPlugin = require("copy-webpack-plugin");
//const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );

module.exports = {
  context: path.join(sourcePath, assetPath),
  mode: 'production',
  entry: {
    bundle: '/js' + '/bundle.js',
    main: '/scss' + '/main.scss',
    swiper: '/js' + '/swiper.js',
    editor: '/scss' + '/editor.scss',
    layout: '/scss' + '/layout.scss',
    admin: '/scss' + '/admin.scss',
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
      filename: 'css/[name].css',
    }),
    /*
    // wordpress dependencies
    // https://developer.wordpress.org/block-editor/reference-guides/packages/packages-dependency-extraction-webpack-plugin/
    new DependencyExtractionWebpackPlugin( {
      injectPolyfill: true,
      combineAssets: true,
    }),
    */
    // copy files (excempt from build)
    new CopyPlugin({
      patterns: [
        // assets
        {
          from: 'icons/*.svg',
        },
        // template files
        {
          from: sourcePath,
          to: outputPath,
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
   * output management
   * https://webpack.js.org/guides/output-management/
   */
  output: {
    filename: 'js/[name].js',
    path: path.join(outputPath, assetPath),
    clean: {
      keep: /acf-json/,
    },
    assetModuleFilename: '[path][name][ext]'
  },
  optimization: {
    minimizer: [
      // For webpack@5 you can use the `...` syntax to extend existing minimizers (i.e. `terser-webpack-plugin`), uncomment the next line
      `...`,
      new CssMinimizerPlugin({
        exclude: /style.css$/,
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
