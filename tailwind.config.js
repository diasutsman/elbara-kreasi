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
        'primaryVariant': '#79A172',
        'secondary': '#6CC4A1',
        'dark': '#2D0333',
        'onPrimary': '#518646',
        'muted' : '#9B9B9B',
      },
      fontFamily: {
        'sans': ["\"Franklin Gothic Demi\"", 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@shrutibalasa/tailwind-grid-auto-fit'),
  ],
}
