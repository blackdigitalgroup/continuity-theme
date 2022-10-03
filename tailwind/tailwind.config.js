// Set flag to include Preflight conditionally based on the build target.
const includePreflight = ( 'editor' === process.env._TW_TARGET ) ? false : true;

module.exports = {
    important: true,
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require( './tailwind-typography.config.js' ),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {

		},
        colors: {
            primary: '#101827'
        },
        fontFamily: {
            // Add font family script in the ./theme/header.php
            body: ["Poppins", "sans-serif"],
            heading: ["Raleway", "sans-serif"]
        }
	},
    safelist: [
        {
            pattern: /m(t|r|b|l|x|y)-(0|1|2|3|4|5|6|7|8|9)/,
            pattern: /p(t|r|b|l|x|y)-(0|1|2|3|4|5|6|7|8|9)/,
        }
    ],
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography.
		require( '@tailwindcss/typography' ),

		// Extract colors and widths from `theme.json`.
		require( '@_tw/themejson' )( require( '../theme/theme.json' ) ),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/line-clamp' ),
	],
};
