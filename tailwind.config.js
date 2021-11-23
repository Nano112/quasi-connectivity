const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            scale: {
                '98': '0.98',
                '99': '0.99',
                '101': '1.01',
                '102': '1.02',
                '103': '1.03',
                '104': '1.04',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui'),],
    daisyui: {
        themes: [
          {
            'mytheme': {
              'primary': '#570df8',
              'primary-focus': '#4506cb',
              'primary-content': '#ffffff',
              'secondary': '#f000b8',
              'secondary-focus': '#bd0091',
              'secondary-content': '#ffffff',
              'accent': '#37cdbe',
              'accent-focus': '#2aa79b',
              'accent-content': '#ffffff',
              'neutral': '#3d4451',
              'neutral-focus': '#2a2e37',
              'neutral-content': '#ffffff',
              'base-100': '#ffffff',
              'base-200': '#f9fafb',
              'base-300': '#d1d5db',
              'base-content': '#1f2937',
              'info': '#2094f3',
              'success': '#5ed500',
              'warning': '#fbc02d',
              'error': '#ff5252',
            },
          },
        ],
      },
};
