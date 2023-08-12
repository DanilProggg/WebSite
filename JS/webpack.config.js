const webpack = require('webpack');
module.exports = {
	watch:true,
	devtool:'source-map',
	entry:{
		filename:'./app.js',
	},
	output:{
		filename:'bundle.js',
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