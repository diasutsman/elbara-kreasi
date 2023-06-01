const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./public/**/*.js",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#3D6631",
                    100: "#5E8B48",
                    200: "#7FAD60",
                    300: "#9FD478",
                    400: "#C0F18F",
                    500: "#A0D995",
                    600: "#80CBA0",
                    700: "#5FA7AD",
                    800: "#3E838B",
                    900: "#1E5F72",
                    950: "#0B3C5D",
                },
                danger: colors.rose,
                success: colors.green,
                warning: colors.amber,
            },
        },
    },
    plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
};
