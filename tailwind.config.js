const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
              ball: {
                'red': '#f00000',
                'black': '#222224',
                'white': '#f0f0f0',
              },
              types: {
                'normal': '#A8A77A',
                'fire': '#EE8130',
                'water': '#6390F0',
                'electric': '#F7D02C',
                'grass': '#7AC74C',
                'ice': '#96D9D6',
                'fighting': '#C22E28',
                'poison': '#A33EA1',
                'ground': '#E2BF65',
                'flying': '#A98FF3',
                'psychic': '#F95587',
                'bug': '#A6B91A',
                'rock': '#B6A136',
                'ghost': '#735797',
                'dragon': '#6F35FC',
                'dark': '#705746',
                'steel': '#B7B7CE',
                'fairy': '#D685AD',
              },
              blue: {
                '200': '#CFCFCF',
              }
            }
        },

        boxShadow: {
          'poke': '0 3px 15px rgb(100 100 100 / 50%)',
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
