const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        backgroundColor: ['responsive', 'hover', 'focus', 'checked']
    },
    plugins: [require('@tailwindcss/ui'),
            ('tailwindcss-plugins/pagination')({
                color: colors['purple-dark'],
                linkFirst: 'mr-6 border rounded',
                linkSecond: 'rounded-l border-l',
                linkBeforeLast: 'rounded-r border-r',
                linkLast: 'ml-6 border rounded',            })],
    
};
