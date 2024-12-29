const path = require('path');
const glob = require('glob');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

// Dynamically gather SCSS and JS files from the assets folder
const generateEntries = () => {
	const entries = {};

	// Match SCSS files
	const scssFiles = glob.sync('./assets/scss/**/*.scss');
	scssFiles.forEach((file) => {
		const name = `css-${path.basename(file, '.scss')}`; // Prefix SCSS entries with "css-"
		entries[name] = path.resolve(__dirname, file);
	});

	// Match JS files
	const jsFiles = glob.sync('./assets/js/**/*.js');
	jsFiles.forEach((file) => {
		const name = `js-${path.basename(file, '.js')}`; // Prefix JS entries with "js-"
		entries[name] = path.resolve(__dirname, file);
	});

	return entries;
};

module.exports = {
	mode: 'production',
	entry: generateEntries(),
	output: {
		path: path.resolve(__dirname, 'build'),
		filename: (pathData) => {
			// Only output JS for JavaScript entries
			if (pathData.chunk.name.startsWith('js-')) {
				return 'js/[name].min.js';
			}
			return 'ignore-[name].js'; // Temporary placeholder for SCSS entries (ignored by plugins)
		},
		clean: true, // Cleans the output folder before each build
	},
	module: {
		rules: [
			// Handle SCSS files
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader, // Extract CSS into separate files
					'css-loader', // Translate CSS into CommonJS
					{
						loader: 'postcss-loader', // Add vendor prefixes
						options: {
							postcssOptions: {
								plugins: [
									require('postcss-import'),
									require('tailwindcss'),
									require('autoprefixer'),
								],
							},
						},
					},
					'sass-loader', // Compile SCSS into CSS
				],
			},
			// Handle JavaScript files
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'], // Transpile modern JS for older browsers
					},
				},
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'css/[name].min.css', // Output CSS files into "build/css"
		}),
	],
	optimization: {
		minimize: true,
		minimizer: [
			new TerserPlugin(), // Minify JS files
			new CssMinimizerPlugin(), // Minify CSS files
		],
	},
	devtool: 'source-map', // Generate source maps for debugging
	// Suppress output of placeholder JS files for SCSS
	stats: {
		excludeAssets: (assetName) => assetName.startsWith('ignore-'),
	},
};
