const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.red,
                primary: {
                    50: "#F7E9EB",
                    100: "#F0D6DA",
                    200: "#E1ADB5",
                    300: "#D28490",
                    400: "#C35B6A",
                    500: "#A63D4D",
                    600: "#86313E",
                    700: "#65252F",
                    800: "#43191F",
                    900: "#220C10"
                },
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ['"Exo 2"'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
