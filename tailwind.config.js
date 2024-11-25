/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./src/**/*.{html,js,jsx,ts,tsx,php}',
		'./public/**/*.{html,php}',
		'./**/*.php',
	],
	theme: {
		extend: {
			fontFamily: {
				lato: ['Lato', 'sans-serif'],
				raleway: ['Raleway', 'sans-serif'],
			},
		},
	},
	plugins: [],
}
