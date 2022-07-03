const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        screens: {
          md: '768px',
          lg: '900px',
          xl: '1458px',
        },
        extend: {
          colors: {
            darkGray: 'hsl(257, 7%, 63%)',
            lightGray: 'hsl(0, 0%, 96%)',
            textLightGray: 'hsl(0, 0%, 51%)',
            progressBraLightGray: 'hsl(0, 0%, 85%)',
            darkBlue: 'hsl(218, 37%, 44%)',
            veryDarkBlue: 'hsl(218, 43%, 23%)',
          },
          fontFamily: {
            sans: ['Manrope', 'sans-serif'],
          },
        },
      },

    plugins: [require('@tailwindcss/forms')],
};
