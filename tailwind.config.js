const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [
        'border-green-500',
        'flex', 'flex-col', 'flex-wrap', 'flex-nowrap', 'flex-row', 'justify-items-center',
        'grid', 'gap-6', 'grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'grid-cols-4', 
        'stroke-gray-400', 'fill-gray-700',
        'underline-offset-3', 'underline-offset-6', 'pb-2', 'pb-1.5',
        'h-48', 'w-48',"w-6", "h-6", "border-4", "border-gray-800", 
        "rounded-full", "animate-spin", "object-fill", "mt-5"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')],
};
