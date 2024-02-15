/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                daintree: {
                    DEFAULT: "#002233",
                    50: "#009CEB",
                    100: "#008FD6",
                    200: "#0074AD",
                    300: "#005885",
                    400: "#003D5C",
                    500: "#002233",
                    600: "#001f2e",
                    700: "#001a26",
                    800: "#00141f",
                    900: "#001119",
                    950: "#000000",
                },
            },
        },
    },

    plugins: [],
};
