/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        'golf-blue': '#1e78af',
      },
    }
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}

