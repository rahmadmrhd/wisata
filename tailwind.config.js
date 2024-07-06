/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  prefix: 'tw-',
  darkMode: 'selector',
  extend: {
    screens: {
      print: { raw: 'print' },
      screen: { raw: 'screen' },
    },
  },
}