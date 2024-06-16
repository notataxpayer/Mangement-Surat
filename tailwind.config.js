/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                lato: ["Lato", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                "cust-cream": "#E9E0D2",
                "cust-green": "#04C800",
                "cust-greenlight": "#0AFF05",
                "cust-red": "#DB0000",
                "cust-redlight": "#FF4141",
                "cust-yellow": "#FFE45E",
                "cust-blue": "#94BDC3",
            },
        },
    },
    plugins: [],
};
