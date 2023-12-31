const webpack = require('webpack');
module.exports = {
	watch:true,
	devtool:'source-map',
	entry:{
		filename:'./index.js',
	},
	output:{
		filename:'public.js',
	},
	module:{
		rules: [
			{
				test: /\.js/,
				exclude:/node_modules/,
				use:{
					loader:'babel-loader',
					options:{
						presets:['@babel/preset-env'],
					}
				}
			},
			{
				test: /\.css$/,
				use: ['style-loader','css-loader']
			}
		]
	}
};