const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'media': {
                    'light-yellow': '#FFBA08',
                    'light-orange': '#FAA307',
                    'carrot-orange': '#F48C06',
                    'orange': '#FF6D1F',
                    'vermilion': '#DC2F02',
                    'red': '#D00000',
                    'dark-red': '#9D0208',
                    'rosewood': '#6A040F',
                    'sienna': '#370617',
                    'grey': '#202020',
                },
                'dark-grey': {
                    100: '#546777',
                    200: '#3b4654',
                    300: '#323d48',
                    400: '#2a323d',
                    500: '#2d3337',
                    600: '#2f2f2f',
                },
                'blue-gray': {
                    100: '#34465c',
                    200: '#3e5571',
                    300: '#4d6684',
                    400: '#364f6d',
                    500: '#2a384b',
                    600: '#212d3e',
                },
                'white-gray': '#98a4b9',
                'orange-gray': '#1e1e1e',
                'fred': '#04a2b3',
                'lany': '#30a1bb',
                'jeremy': '#21c1d6',
                'purp': '#7c4dff',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                futura: 'Futura',
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
