const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    important: true,
    // Active dark mode on class basis
    darkMode: "class",
    i18n: {
        locales: ["es_PE"],
        defaultLocale: "es_PE",
    },
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
