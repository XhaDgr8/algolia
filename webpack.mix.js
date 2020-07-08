const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


    module.exports = {
        module: {
          rules: [
            {
            test: /\.(scss)$/,
            use: [{
                loader: 'style-loader', // inject CSS to page
            }, {
                loader: 'css-loader', // translates CSS into CommonJS modules
            }, {
                loader: 'postcss-loader', // Run postcss actions
                options: {
                plugins: function () { // postcss plugins, can be exported to postcss.config.js
                    return [
                    require('autoprefixer')
                    ];
                }
                }
            }, {
                loader: 'sass-loader' // compiles Sass to CSS
            }]
            },
          ]
        }
      }

      mix.js('resources/js/app.js', 'public/js').
        sass('resources/sass/app.scss', 'public/css');