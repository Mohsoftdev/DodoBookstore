import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Ubuntu', ...defaultTheme.fontFamily.sans],
            },
        },

        variants: {
            float: ['responsive', 'direction'],
            margin: ['responsive', 'direction'],
            padding: ['responsive', 'direction'],
            textAlign: ['responsive', 'direction'],
        },
    },

    plugins: [forms, typography, require('tailwindcss-dir')()],
};
