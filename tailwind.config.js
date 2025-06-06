import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Bricolage Grotesque", ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
                padding: "1rem",
                screens: {
                    sm: "100%",
                    md: "100%",
                    lg: "100%",
                    xl: "1280px",
                    "2xl": "1280px",
                },
            },
        },
    },
    plugins: [],
};
