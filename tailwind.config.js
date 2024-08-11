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
        'stroke-gray-400', 'fill-gray-700',"block", "mb-2", "text-sm", "font-medium", "text-gray-900", "dark:text-white",
        'underline-offset-3', 'underline-offset-6', 'pb-2', 'pb-1.5',
        'h-48', 'w-48',"w-6", "h-6", "border-4", "border-gray-800", "w-12",
        "rounded-full", "animate-spin", "object-fill", "mt-5","top-1","right-0", "text-xs",
        "w-72", "h-10", "px-4", "mx-4", "pl-8", "pl-10", "py-1", "p-2.5", "p-3","absolute","relative","whitespace-nowrap",
        "hover:bg-gray-100", "py-4", "py-2","w-3", "h-3","text-blue-500","align-middle","align-baseline",
        "inline-block","align-text-bottom","align-bottom","text-red-500", "text-amber-500" ,"inset-y-0", "left-0"
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
