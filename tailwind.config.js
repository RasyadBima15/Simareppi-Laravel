module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
    // "./node_modules/flowbite/dist/datepicker.min.js"
  ],
  theme: {
    fontFamily: {
      bahnschrift: ['Bahnschrift', 'sans-serif'],
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

// @vite(['resources/css/app.css','resources/js/app.js']) to use flowbite and takilwindcss, copy this code