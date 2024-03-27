const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'sm': '576px',
                'md': '768px',
                'lg': '992px',
                'xl': '1200px',
                '2xl': '1600px',
            },
            colors: {
                primary: '#a11523',
                secondary: '#001c47',
                tertiaire: '#ffbb09'
            },
            backgroundImage: {
                'image-sider': "url('/img/sider_guest-page.png')",
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
    darkMode: 'false',
};
