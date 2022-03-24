const path = require("path")
const nodeExternals = require('webpack-node-externals');

module.exports = {
	entry: "./src/index.js", // Entry File
	target: 'node', // in order to ignore built-in modules like path, fs,     etc. 
	externals: [nodeExternals()],
	output: {
		path: path.resolve(__dirname, "dist"), //Output Directory
		filename: "bundle.js", //Output file
	},
	module: {
		rules: [
			{
				test: /\.js$/, //Regular expression 
				exclude: /node_modules/,//excluded node_modules 
				use: {
					loader: "babel-loader",
					options: {
						presets: ["@babel/preset-env"]  //Preset used for env setup
					}
				}
			}
		]
	}
};
