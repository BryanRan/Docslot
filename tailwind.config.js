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
        'black-green': '#05180B',
        'dark-green': '#165136',
        'light-green': '#227D53',
      },
      backgroundColor: {
        'custom-neutral': '#F1F1F1',
        'd-green': '#165136',
        'l-green': '#227D53'
      }
    },
  },
  plugins: [],
}