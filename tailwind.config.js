/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.{php,html}",
    "./app/Views/*.{php,html}",
    "./public/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'custom-green': '#20774F',
      },
    },
  },
  plugins: [],
}