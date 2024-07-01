// Import the original config from the @wordpress/scripts package.
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

const path = require( 'path' );

// Import the helper to find and generate the entry points in the src directory
const { getWebpackEntryPoints } = require( '@wordpress/scripts/utils/config' );

// Add any a new entry point by extending the webpack config.
module.exports = {
    ...defaultConfig,
    mode: 'development',
    devtool: 'inline-source-map',
    entry: {
        ...getWebpackEntryPoints(),
        index: './src/index.jsx',
    }
}