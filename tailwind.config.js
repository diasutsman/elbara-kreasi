/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#A0D995',
        'secondary': '#6CC4A1',
        'dark': '#2D0333',
        'onPrimary': '#518646',
      },
      fontFamily: {
        'sans': ["\"Franklin Gothic Demi\"", 'sans-serif'],
      },
    },
  },
  plugins: [],
}
