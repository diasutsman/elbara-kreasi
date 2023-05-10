/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./public/**/*.js", "./resources/**/*.vue"],
    theme: {
        extend: {
            container: {
                center: true,
                padding: "1rem",
            },
            colors: {
                // Light Section
                primary: "#A0D995",
                primaryVariant: "#79A172",
                primaryVariantDark: "#7AA172",
                secondary: "#6CC4A1",
                secondaryVariant: "#E3F8DF",
                placeholder: "#D9D9D9",

                // Dark Section
                secondaryDark: "#7ECBAC",
                dark: "#2D0333",
                onPrimary: "#518646",
                onPrimaryDark: "#5B974F",
                onPrimaryLight: "#E3F8DF",
                muted: "#9B9B9B",
                desc: "#606060",
                grey: "#D9D9D9",
                greyDark: "#333333",
                linkDarkMode: "#F6CCFC",
                "dark-mode": "#0D0D0D",
                "dark-mode-text": "#12350C",
            },
            fontFamily: {
                sans: ["Helvetica", "sans-serif"],
            },
            height: {
                85: "22rem",
            },
            spacing: {
                25: "100px",
            },
        },
    },
    plugins: [require("@shrutibalasa/tailwind-grid-auto-fit"), require("prettier-plugin-tailwindcss")],
};
